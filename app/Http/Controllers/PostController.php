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
        //Warning $data = Temporary Image Path
        $data = request()->validate([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image']
        ]);

        //dd(request('image')); to check if instance exist
        
        //True Image Path storage/public/uploads
        $imagePath = request('image')->store('uploads', 'public');

        //Using Relationship between User && Post Models Get Authentificated User && assing his own Post
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            //Get the real path of image in public file
            'image' => $imagePath
        ]);

        
        return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }

    
}
