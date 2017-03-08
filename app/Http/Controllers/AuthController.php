<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\MessageBag;
class AuthController extends Controller
{
    
   	public function showLogin()
	{
	    return View::make('pages.authentication.login');
	}

	public function doLogin(Request $request)
	{
		$inputs=Input::all();
		//print_r($inputs);
		$rules = array(
		    'username'    => 'required', 
		    'password' => 'required' 
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			//dd($validator->errors());
    		return Redirect::back()->withErrors($validator);
    	}
    	else{
    		$userdata = array(
        		'username'     => Input::get('username'),
        		'password'  => Input::get('password')
    		);
    		if (Auth::attempt($userdata)) {

        		echo 'SUCCESS!';
        		return Redirect::to('/');

    		} else {        
		        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
		        return Redirect::back()->withErrors($errors);

    		}

    	}
	}
}
