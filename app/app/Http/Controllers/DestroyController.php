<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function destroy(string $id)
    {
        dd($id);
    }
}
