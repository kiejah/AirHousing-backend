<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register/Create form
    public function create(){
        return view('users.register');
    }
    //Create new user
    public function store(Request $request){

        $formFields = $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','confirmed','min:6'],
        ]);
        //Hash Password
        $formFields['password']= bcrypt($formFields['password']);
        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message','User created an logged in');


    }

    //logout
    public function logout(Request $request){
        auth()->logout();
        //invalidate user session
        $request->session()->invalidate();
        //regenerate ne csrf token
        $request->session()->regenerateToken();

        return redirect('/')->with('message','you have been logged out');
    }
    //show login form
    public function login(){
        return view('users.login');
    }
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);
        if(auth()->attempt($formFields)){
            //regenerate session
            $request->session()->regenerate();

            return redirect('/')->with('message','You are now logged in!');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');



    }


}
