<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = DB::table('users')->get();
        // $users = User::simplePaginate(5);

        return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createUser',
            [    
                'title' => 'Создать пользователя',
                'url' => route('admin.user.index'),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'max:20', 'regex:/^[a-z, 0-9]+$/i', 'unique:' . User::class],
            'password' => ['required'], //Password::min(8)->letters()
        ], $this->messages());

        $user = User::create([
            'name' => $credentials['name'],
            'password' => bcrypt($credentials['password']),
            'description' => $request->description,
            'admin' => isset($request->isAdmin) ? 1 : 0 
        ]);

        return redirect(route('admin.user.index'));
    }

    /**
     * Показать перед удалением
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('admin.destroyUser', [
            'user' => $user,
            'title' => 'Удалить пользователя',
            'url' => route('admin.user.index'),
        ]);
    }

    /**
     *  Показать форму редактирования
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('admin.editUser', [
            'title' => 'Редактирование:',
            'url' => route('admin.user.index'),
            'id' => $id,
            'description' => $user->description,
            'name' => $user->name,
            'admin' => $user->admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        // $credentials = $request->validate([
        //     'password' => ['required'], //Password::min(8)->letters()
        // ], $this->messages());
        
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        
        $user->description = $request->description;
        $user->admin = isset($request->isAdmin) ? 1 : 0;
        $user->save();
        
        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ( isset($user->catalog_name) ) {
            Storage::disk('public')->deleteDirectory($user->catalog_name);
        }

        User::destroy($id);
        
        return redirect(route('admin.user.index'));
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
            'password.required' => 'Поле пароль должно быть заполнено'
        ];
    }
}
