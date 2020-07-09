<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    protected $fillable = ['caption', 'image', 'user_id'];
    
    /**User Have to be Authentificated to Post Image */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //Pluck = get user_id profile followed
        $users = auth()->user()->following->pluck('user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(3); //lastest == order_by DESC
        //dd($posts);
        return view('posts.index', compact('posts'));
    }

    
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //Warning $data = Temporary Image Path
        $data = request()->validate([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image']
        ]);
        
        //Using Relationship between User && Post Models Get Authentificated User && assing his own Post
        $post = Post::create($request->all());
        $post->user_id = Auth::user()->id;
        $post->save();
    
        if ($request->hasFile('image') ) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(900,900)->save(public_path("./storage/posts/".$filename));
            $post->image = $filename;
            $post->save();
        }

        return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function destroy($id)
    {
        $post = Post::find($id);
            //dd($post);
        $imagePath = $post->image;
            //dd($imagePath);

        if (File::exists(public_path('/storage/posts/' . $imagePath))) {
            File::delete(public_path('/storage/posts/' . $imagePath));
        }

        $post->delete();
        
        return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }
    
}
