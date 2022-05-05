<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(\App\Models\User $user)
    {
        return view('profiles.index', compact('user'));
    }
    public function edit(\App\Models\User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }
    public function find()
    {
        $profiles = \App\Models\Profile::all()->sortBy('created_at');
        
        return view('freelancers.index', compact('profiles'));
    }
    public function update(\App\Models\User $user)
    {
        $data = request()->validate([
                'title' => '',
                'profilepic' => 'image',
                'idnumber' => '',
                'birthyear' => '',
                'city' => '',
                'description' => '',
                'phonenumber' => '',
                'socialnetwork' => '',
                'address' => '',
                'email' => '',
                'education' => '',
                'summary' => ''
        ]);
        if (request('profilepic'))
        {
            $imagePath = request('profilepic')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();
            $data['profilepic'] = $imagePath;
        }
        $user->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}
