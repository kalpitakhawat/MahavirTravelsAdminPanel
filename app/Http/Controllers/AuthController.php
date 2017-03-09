<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Hash;
use App\User;
use Illuminate\Support\MessageBag;
class AuthController extends Controller
{
    
   	public function showLogin()
	{
	    return View::make('pages.authentication.login');
	}

	public function doLogin(Request $request){
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
	public function dologout(Request $request)
	{
		Auth::logout();
		return Redirect::to('login');

	}
	public function dochange(Request $request)
	{
		$rules = array(
		    'current-password'    => 'required', 
		    'password' => 'required|same:password',
    		'password_confirmation' => 'required|same:password',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			//dd($validator->errors());
    		return Redirect::back()->withErrors($validator);
    	}
    	else{
    		$current_password = Auth::User()->password;           
			if(Hash::check(Input::get('current-password'), $current_password))
			{           
				$user_id = Auth::User()->id;                       
				$obj_user = User::find($user_id);
				$obj_user->password = Hash::make(Input::get('password'));
				$obj_user->save(); 
        		return Redirect::to('/');
			}
			else{
				$errors = new MessageBag(['current-password' => ['Please Enter Correct current password.']]);
		        return Redirect::back()->withErrors($errors);
			}
    	}
	}
}
