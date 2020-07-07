<?php

namespace App\Http\Controllers;

use App\Post;
use Intervention\Image\Facades\Image;

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

    public function store()
    {
        //Warning $data = Temporary Image Path
        $data = request()->validate([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image']
        ]);
        
        //True Image Path storage/public/uploads
        $imagePath = request('image')->store('uploads', 'public');
        
        if($imagePath){
        //Using Intervention Image library + Facades to resize Image
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(900, 900);
        $image->save();

        }else{
            dd('Error Path Public/uploads');
        }

        
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


    public function destroy($id)
    {
        $post = Post::find($id);
            //dd($post);
        $imagePath = $post->image;
            //dd($imagePath);
        if(!empty($imagePath) && file_exists("/storage/{$imagePath}")) {
            unlink(public_path("/storage/{$imagePath}"));
        }

        $post->delete();
        
        return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }
    
}
