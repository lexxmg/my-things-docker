<?php

namespace App\Http\Controllers\Admin\api;

use App\Models\User;
use App\Http\Controllers\Controller;

class GetUserJsonController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::simplePaginate(15)->toJson();
    }
}
