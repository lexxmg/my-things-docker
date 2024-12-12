<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;

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
//dd($request);
        $user = User::find($avatar);

        $file = $request->base64_image;
        $data = explode(',', $file);
        $extention = explode(';', explode('/', $data[0])[1])[0];
        $data = base64_decode($data[1]);
        file_put_contents(public_path('img/aa.' . $extention), $data);
       // dd($data);
        //$extention = $request->file('base64_image')->getClientOriginalExtension();
        //$path = Image::make($data)->storeAs('user_' . $user->name, 'avatar.' . $extention, 'public');

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
