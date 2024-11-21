<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function index()
    {
        return view('destroy', [
            'title' => 'Удалить аккаунт',
            'url' => route('setting')
        ]);
    }

    /**
     * Удалить пользователя
     */
    public function destroy(Request $request, string $id)
    {
        if (Auth::id() != $id) {
            return abort(404);
        }

        $credentials = $request->validate([
            'password' => ['required'],
        ], $this->messages());

        $currentPassword = $credentials['password'];

        try {
            Auth::logoutOtherDevices($currentPassword);
            auth('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors([
                'err' => 'Попробуйте ещё раз!'
            ]);
        } 

        User::destroy($id);

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
            'password.required' => 'Поле пароль должно быть заполнено',
            'password_confirmation.required' => 'Поле подтверждение пароля должно быть заполнено',
            'password.confirmed' => 'Пароли не совпадают!',
        ];
    }
}
