<?php

namespace App\Http\Controllers;

use App\Http\Requests\NIMValidationRequest;
use App\Models\Creation;
use App\Models\Study;
use App\Models\User;
use App\Models\Vote;
use App\Models\VoteHistory;

class HomeController extends Controller
{
    public function index()
    {
        if (session('nim')) {
            return redirect()->route('vote');
        }
        return view('welcome');
    }

    public function connect($nim)
    {
        $scanned = explode('.', $nim);
        $number = implode('', $scanned);
        return view('login', compact('number'));
    }

    public function loginManual()
    {
        return view('login-manual');
    }

    public function vote()
    {
        if (!session('nim')) {
            return redirect()->route('welcome');
        }
        $slug = request('m') ?? null;
        $study = Study::whereSlug($slug)->first();
        if ($study) {
            $creations = Creation::whereStudyId($study->id)->latest()->get();
        } else {
            $creations = Creation::latest()->get();
        }
        return view('vote', compact('creations'));
    }

    public function detail($slug)
    {
        $creation = Creation::withCount('vote')->whereSlug($slug)->firstOrFail();
        return view('detail-karya', compact('creation'));
    }

    public function login(NIMValidationRequest $request)
    {
        $user = User::whereNim($request->digit)->first();
        if (!$user) {
            return back()->with(['error' => 'NIM Anda salah'])->withInput();
        }
        session(['nim' => $user->nim]);
        return redirect()->route('vote');
    }

    public function submitVote()
    {
        $user = User::whereNim(session('nim'))->firstOrFail();

        // query check apakah sudah memberikan vote pada karya ini
        $voted = Vote::whereUserId($user->id)->whereCreationId(request('creation_id'))->count();
        if ($voted >= 1) {
            return redirect()
                ->back()
                ->withInfo('Anda sudah memberikan vote pada karya ini!');
        }

        // query check apakah sudah memberikan vote pada karya yang lain pada matkul ini, apakah ingin menggantinya?
        $creation = Creation::find(request('creation_id'));
        $hasVoted = Vote::whereUserId($user->id)
            ->whereStudyId($creation->study_id)
            ->count();
        if ($hasVoted >= 1) {
            return redirect()
                ->back()
                ->withWarning('Anda sudah memberikan vote pada karya lain di Matakuliah yang sama!');
        }


        // siapkan tabel history vote user
        Vote::create([
            'user_id' => $user->id,
            'creation_id' => $creation->id,
            'study_id' => $creation->study_id,
            'note' => request('cMessage') ?? null
        ]);

        VoteHistory::create([
            'user_id' => $user->id,
            'creation_id' => $creation->id,
            'note' => request('cMessage') ?? null
        ]);

        return redirect()->back()->withSuccess('Terimakasih, Anda berhasil memberikan vote!');
    }
}
