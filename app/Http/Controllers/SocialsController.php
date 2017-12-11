<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SocialAuth;
use App\User;

class SocialsController extends Controller
{
    public function auth($provider){
    	return SocialAuth::authorize($provider);
    }

    public function auth_callback($provider){
    	SocialAuth::login($provider ,function($user,$details){

           


    		$existingUser = User::where('email', $details->email)->first();

		    if ($existingUser) {
		        return $existingUser;
		    }

    		   if($details->full_name == null) {
    		   		$user->name = $details->nickname;
    		   }else {
    		   		$user->name = $details->full_name;
    		   }
    		   $user->email = $details->email;
    		   $user->avatar = $details->avatar;
    		   $user->save();

    		   

    	});


    	return redirect()->route('discuss.index');
	    
    }
}
