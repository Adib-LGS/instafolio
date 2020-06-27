<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**User Have to be Authentificated to Post Image */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public static function index()
    {
        //Pluck = get user_id profile followed
        $users = auth()->user()->following->pluck('user_id');
        $posts = Post::whereIn('user_id', $users)->latest()->paginate(3); //lastest == order_by DESC
        //dd($posts);
        return view('posts.index', compact('posts'));
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
        
        //True Image Path storage/public/uploads
        $imagePath = request('image')->store('uploads', 'public');
        
        //Using Intervention Image library + Facades to resize Image
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(800, 800);
        $image->save();
        
        //Using Relationship between User && Post Models Get Authentificated User && assing his own Post
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function destroy(User $user, Post $post)
    {
        $this->authorize('delete', $user->profile);

       
        $data = request()->hasFile([
            'caption' => ['string'],
            'image' => ['image']
        ]);
        
        $post = Post::findOrFail($data);
        

        if(!empty(request('image')) ) {
            $imagePath = request('image')->file_exists('uploads', 'public');
            $image = unlink(public_path("/storage/{$imagePath}"));
            $image->delete();

            $user->profile->$post->delete([
                'caption' => $data['caption'],
                'image' => $imagePath
            ]);
        }

        
        
        /*if(!empty(request('image'))){
            $imagePath = request('image')->file_exists('uploads', 'public');
            $image = Image::make(public_path("/storage/{$imagePath}"));
            $image->delete(array_merge([
                'caption' => $data['caption'],
                'image' => $imagePath
            ]));   
        }*/
        
        //return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }
    
}
