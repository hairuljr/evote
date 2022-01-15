<?php

namespace App\Http\Controllers;

use App\Http\Requests\NIMValidationRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function connect()
    {
        return view('login');
    }

    public function vote()
    {
        return view('vote');
    }

    public function login(NIMValidationRequest $request)
    {
        $digits = $request->except('_token');
        $nim = [];
        foreach ($digits as $value) {
            array_push($nim, $value);
        }
        session(['nim' => implode('', $nim)]);
        return redirect()->route('vote');
    }
}
