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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Показать полноразмерное фото
     */
    public function show(string $id)
    {
        if (Auth::id() != $id) {
            return abort(404);
        }

        $user = User::find($id);
        $image = $user->image;
        $alt = 'Фото отсутствует';

        if ($user->thumbnail) {
            $alt = 'Аватар пользователя';
        }    

        return view('showAvatar', [
            'title' => 'Аватар',
            'image' => asset('/storage/' . $image),
            'alt' => $alt,
            'userId' => $id,
            'url' => route('setting') //url()->previous()
        ]);
    }

    /**
     * Показать редактор фото 
     */
    public function edit(string $id)
    {
        if (Auth::id() != $id) {
            return abort(404);
        }

        $user = User::find($id);
        $image = $user->image;
        $alt = 'Фото отсутствует';

        if ($user->thumbnail) {
            $alt = 'Аватар пользователя';
        }    

        return view('editAvatar', [
            'title' => 'Редактировать аватар',
            'image' => asset('/storage/' . $image),
            'alt' => $alt,
            'url' => url()->previous()
        ]);
    }

    /**
     * Загрузить аватар
     */
    public function update(Request $request, string $id)
    {
        if (Auth::id() != $id) {
            return abort(404);
        }

        $user = User::find($id);
        $catalogName = 'user_id-' . $user->id;

        $image = $request->file('image');
        if ($image) {
            foreach ($image as $key => $value) {
                $image = $value;
            }
        }    
        
 
        $file = $request->base64_image;

        $data = explode(',', $file);
        $extention = explode(';', explode('/', $data[0])[1])[0];
        $data = base64_decode($data[1]);
        $pathPreview = $catalogName . '/preview/avatar.' . $extention;

        Storage::disk('public')->put($pathPreview, $data);
        
        if ($image) {
            $extention = $image->getClientOriginalExtension();
            $path = $image->storeAs($catalogName . '/original', 'avatar.' . $extention, 'public');
            
            $user->image = $path;
        }

        $user->thumbnail = $pathPreview;
        $user->catalog_name = $catalogName;
        $user->save();

        return redirect(route('setting'));
    }

    /**
     * Удаление аватара
     */
    public function destroy(Request $request, string $id)
    {
        if (Auth::id() != $id) {
            return abort(404);
        }
        
        $user = User::find($id);

        if (!$request->delete) {   // Подтверждение удаления
            return view('alert', [
                'text' => 'Вы точно хотите удалить аватар?',
                'cencel' => url()->previous()
            ]);
        }

        if ( isset($user->catalog_name) ) {
            Storage::disk('public')->delete([
                $user->image,
                $user->thumbnail
            ]);

            $user->image = null;
            $user->thumbnail = null;
            $user->catalog_name = null;
            $user->save();
        }

        return redirect(route('home'));
    }
}
