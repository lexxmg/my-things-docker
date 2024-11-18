<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required',],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(route('home'));
            //return redirect()->intended('dashboard');
        }


        return back()->withErrors([
            'mail' => 'Имя или пароль не верны',
        ])->onlyInput('mail');
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect(route('login'));
    }
}
