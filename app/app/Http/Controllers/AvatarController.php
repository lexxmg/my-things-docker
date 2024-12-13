<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
        $catalogName = 'user_id-' . $user->id;

        $file = $request->base64_image;

        $data = explode(',', $file);
        $extention = explode(';', explode('/', $data[0])[1])[0];
        $data = base64_decode($data[1]);
        $pathPreview = $catalogName . '/preview/avatar.' . $extention;

        Storage::disk('public')->put($pathPreview, $data);
        
        $extention = $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs($catalogName . '/original', 'avatar.' . $extention, 'public');
        
        $user->image = $path;
        $user->thumbnail = $pathPreview;
        $user->catalog_name = $catalogName;
        $user->save();

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
