<?php

namespace App\Http\Controllers;

use App\Http\Requests\NIMValidationRequest;
use Illuminate\Http\Request;

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
        $digits = str_split($number);
        return view('login', compact('digits', 'number'));
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
        session(['nim' => $request->all_digit]);
        return redirect()->route('vote');
    }
}
