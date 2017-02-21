<?php

namespace App\Http\Controllers\Profile;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function profile(Request $request) {
    	$user = Auth::user();

    	if($request->isMethod('post')) {
    		$this->validate($request, [
    				'name' => 'required|max:255',
            		// 'email' => 'required|email|max:255|unique:users',
    			]);

    		if($request->hasFile('image')) {
	            $extension = $request->file('image')->getClientOriginalExtension();
	            $imageName = time().'.'.$extension;
	            $destinationPath = 'img/';
	            $request->file('image')->move($destinationPath, $imageName);

	            $request['photo'] = $imageName;
	        }
	        $user_info = User::find($user->id);

	        $request['email'] = $user_info->email;

	        $user_info->update($request->all());
	        $user = $user_info;
    	}

    	
    	return view('profile.home', get_defined_vars());
    }
}
