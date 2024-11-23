<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required',],
            'password' => ['required'],
        ], $this->messages());
        
        if (Auth::guard('admin')->attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect(route('admin.user.index'));
            //return redirect()->intended('dashboard');
        }


        return back()->withInput()->withErrors([
            'err' => 'Имя или пароль введены не верны'
        ]);
    }

    public function logout(Request $request)
    {
        auth('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
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
