<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**Have to be Authentificated to do Posts Action */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('posts.create');
    }
}
