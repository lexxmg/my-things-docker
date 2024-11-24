<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.password', [
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
            'url' => route('admin.setting')
        ]);
    }

    /**
     * Выйти на всех устройстывх
     */
    public function store(Request $request)
    {
        //
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
        if (Auth::guard('admin')->id() != $id) {
            return abort(404);
        }

        $user = AdminUser::find($id);

        $reName = true;

        if ($user->name === $request->name) {
            $reName = false;
        }
        

        $credentials = $request->validate([
            'name' => ['required', 'max:20', 'regex:/^[a-z, 0-9, _]+$/i', $reName ? 'unique:' . AdminUser::class : 'required'],
            'password' => ['required', 'confirmed'], //Password::min(8)->letters()
            'password_confirmation' => ['required',],
        ], $this->messages());

        $user->name = $credentials['name'];
        $user->password = bcrypt($credentials['password']);
        $user->save();

        auth('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (Auth::guard('admin')->attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect(route('admin.user.index'));
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
            'name.required' => 'Поле имя должно быть заполнено',
            'name.unique' => 'Данное имя уже используеться',
            'name.regex' => 'Должны быть только латинские буквы',
            'name.max' => 'Имя может содержать на больше 20 символов',
            'password.required' => 'Поле пароль должно быть заполнено',
            'password_confirmation.required' => 'Поле подтверждение пароля должно быть заполнено',
            'password.confirmed' => 'Пароли не совпадают!',
        ];
    }
}
