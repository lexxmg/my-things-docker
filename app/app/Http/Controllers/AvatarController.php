<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('addAvatar', [
            'title' => 'Загрузить аватар',
            'url' => route('setting')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Загрузить аватар
     */
    public function update(Request $request, string $avatar)
    {
        if (Auth::id() != $avatar) {
            return abort(404);
        }

        $user = User::find($avatar);

        $extention = $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('user_' . $user->name, 'avatar.' . $extention, 'public');

        //$user->avatar = $path;
        
        //$user->save();

        return redirect(route('setting'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
