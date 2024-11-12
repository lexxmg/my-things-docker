<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $places = [1, 2, 3, 4, 5, 6, 7]; // должна быть модель мест
        
        return view('layout.app', [
            'places' => $places
        ]);
    }
}
