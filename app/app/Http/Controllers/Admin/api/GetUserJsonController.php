<?php

namespace App\Http\Controllers\Admin\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetUserJsonController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::simplePaginate(15)->toJson();
    }

    /**
     * Поиск пользователуй
     */
    public function search(Request $request)
    {
        $search = $request->search ?? '000';

        return User::where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->get()->toJson();

        //->orWhere('email', 'like', '%' . $search . '%')    
    }
}
