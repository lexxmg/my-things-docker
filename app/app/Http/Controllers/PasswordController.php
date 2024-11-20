<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('password', [
            'title' => 'Изменить пароль',
            'url' => route('setting')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logoutAll', [
            'title' => 'Выйти на всех устройствах кроме текущего',
            'url' => route('setting')
        ]);
    }

    /**
     * Выйти на всех устройстывх
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'password' => ['required'],
        ], $this->messages());

        $currentPassword = $credentials['password'];

        try {
            Auth::logoutOtherDevices($currentPassword);
            return redirect(route('home'));
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors([
                'err' => 'Попробуйте ещё раз!'
            ]);
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Изменить пароль
     */
    public function update(Request $request, string $id)
    {
        if (Auth::id() != $id) {
            return abort(404);
        }

        $user = User::find($id);

        $credentials = $request->validate([
            'password' => ['required', 'confirmed'], //Password::min(8)->letters()
            'password_confirmation' => ['required',],
        ], $this->messages());

        $user->password = bcrypt($credentials['password']);
        $user->save();

        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (Auth::attempt(['name' => $user->name, 'password' => $credentials['password']], true)) {
            $request->session()->regenerate();

            try {
                Auth::logoutOtherDevices($credentials['password']);

                return redirect(route('home'));
            } catch (\Throwable $th) {
                return back()->withInput()->withErrors([
                    'err' => 'Что то пошло не так, попробуйте ещё раз!'
                ]);
            }
            
        }

        return back()->withInput()->withErrors([
            'err' => 'Попробуйте ещё раз!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'password.required' => 'Поле пароль должно быть заполнено',
            'password_confirmation.required' => 'Поле подтверждение пароля должно быть заполнено',
            'password.confirmed' => 'Пароли не совпадают!',
        ];
    }
}
