<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    /**Type int User via User.php  getRouteKeyName() */
    public function show(User $user)
    {
        /**Get the right user Eloquent User $user replace code bellow*/
        //$user = User::find($username);
        //dd($user);

        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required|url'
        ]);

        auth()->$user->profile->update($data);

        return redirect()->route('profiles.show', ['user' => $user]);
    }
}
