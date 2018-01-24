<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSignUp()
    {
        return view('admin.register');
    }
    
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:4',
        ]);
        
        $user = new User();
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));

        $user->save();

    	Auth::login($user);
        
        return redirect()->route('home');
    }

    public function getSignIn()
    {
        return view('admin.login');     
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [ 
            'email' => 'required',
            'password' => 'required'
        ]);

    	if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']]) ) {
    		return redirect()->route('home');
    	}
    	return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
