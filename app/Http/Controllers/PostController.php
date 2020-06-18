<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**User Have to be Authentificated to Post Image */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image']
        ]);

        //dd(request('image')); to check if instance exist, then create store func

        request('image')->store('uploads', 'public');
    }

    
}
