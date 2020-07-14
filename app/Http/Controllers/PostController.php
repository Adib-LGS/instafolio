<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $data = $this->validate($request, [
            'caption' => ['required', 'string'],
            'image' => ['required', 'image']
        ]);
        
        //Using Relationship between User && Post Models Get Authentificated User && assing his own Post
        if ($request->hasFile('image') ) {
            $image = Image::make($request->file('image'))->fit(800,800)->stream();
            $path = $request->file('image')->store('posts', 's3');
            //return $path;
            Storage::disk('s3')->setVisibility($path, 'public');
            $post = Post::create([
                'filename' => basename($path),
                'image' => Storage::disk('s3')->put('posts/', $path, $image),
                'caption' => $data['caption']
            ]);
            $post->user_id = Auth::user()->id;
            $post->save();
        
            ob_end_clean();
        }


        /*If you're using Local Storage dont't forget to remove (filename) of some tables post & profiles 

        //Using Relationship between User && Post Models Get Authentificated User && assing his own Post
        $post = Post::create($request->all());
        $post->user_id = Auth::user()->id;
        $post->save();
    
        if ($request->hasFile('image') ) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path("storage/posts/".$filename))->fit(900,900);
            $post->image = $filename;
            $post->save();
        }
        */

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

        if (File::exists(storage_path('app/public/posts/' . $imagePath))) {
            File::delete(storage_path('app/public/posts/' . $imagePath));
        }

        $post->delete();
        
        return redirect()->route('profiles.show', ['user' => auth()->user()]);
    }
    
}
