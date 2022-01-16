<?php

namespace App\Http\Controllers;

use App\Http\Requests\NIMValidationRequest;
use App\Models\User;

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

    public function vote()
    {
        return view('vote');
    }

    public function detail()
    {
        return view('detail-karya');
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
}
