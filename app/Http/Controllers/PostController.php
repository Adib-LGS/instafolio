<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        
        //Using Intervention Image library + Facades to resize Image
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();
        
        //Using Relationship between User && Post Models Get Authentificated User && assing his own Post
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            //Get the real path of image in public file
            'image' => $imagePath
        ]);

        
        return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function index()
    {
        //Pluck = get user_id profile followed
        $users = auth()->user()->following->pluck('user_id');
        $posts = Post::whereIn('user_id', $users)->latest()->paginate(6); //lastest == order_by DESC
        //dd($posts);
        return view('posts.index', compact('posts'));
    }
    
}
