<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Image;

class ProfileController extends Controller
{
    public function showProfile()
    {
    	return view('users.profile', array('user' => Auth::user()));
    }

    public function updateProfile(Request $request)
    {
    	if($request->hasFile('avatar'))
    	{
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' .$avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/'.$filename));

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();

    	}

    	return view('users.profile', array('user' => Auth::user()));
    }
}
