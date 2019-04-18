<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input; 


class MainController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        // redirects to login screen
        return Redirect::to('auth.login'); 
    }

    public function doLogin(){
        $rules = array(
            'email'=> 'required|email',
            'password'=>'required|alphaNum|min:8'
        );
        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::to('Login')->withErros($validator)
            ->withInput(Input::except('password'));
        }
        else{
            $userdata = array(
                'email'=>Input::get('eamil'),
                'password' =>Input::get('password')
            );

        if (Auth::attempt($userdata)){
           //success
        }
        else{
            //failed
            }   
            return Redirect::to('checklogin');

        }
    }
}
