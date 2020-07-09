<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image as Image;


class ProfileController extends Controller
{
    
    /**Type int User via User.php  getRouteKeyName() */
    public function show(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->profile->id) : false;
        
        $postCount = Cache::remember('posts.count' . $user->id, now()->addSeconds(30), function () use ($user) {
           return $user->posts->count();
        });

        $followersCount = Cache::remember('followers.count' . $user->id, now()->addSeconds(30), function () use ($user) {
           return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('following.count' . $user->id, now()->addSeconds(30), function () use ($user) {
           return $user->following->count();
        });

        return view('profiles.show', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        //PolicyProfile
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required|url',
            'image' => 'sometimes|image|max:3000|mimes:jpeg,bmp,png'
        ]);

        $user->profile->update($request->all());

        if ($request->hasFile('image') ) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(800,800)->save(public_path("./storage/avatars/".$filename));
            $user->profile->image = $filename;
            $user->profile->save();
        }

        return redirect()->route('profiles.show', ['user' => $user])->with('status', 'Your profile has been updated successfully');
    }

    public function search(User $user)
    {
        request()->validate([
           'q' => 'required'
        ]);

        $q = request()->input('q');

        if(!empty($q)){
            $user = User::where('username', 'like', "%$q%")->first('username');
            if($user){
                //dd($user);
                return redirect()->route('profiles.show', ['user' => $user]);
            }else{
                return redirect()->back();
            }
        }
       
    }
}
