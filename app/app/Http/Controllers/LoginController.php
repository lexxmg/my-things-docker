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
        ], $this->messages());
        
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect(route('home'));
            //return redirect()->intended('dashboard');
        }


        return back()->withInput()->withErrors([
            'err' => 'Имя или пароль введены не верны'
        ]);
    }

    public function logout(Request $request)
    {
        auth('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле имя должно быть заполнено',
            'password.required' => 'Поле пароль должно быть заполнено'
        ];
    }
}
