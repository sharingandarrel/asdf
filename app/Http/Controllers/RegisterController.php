<?php

namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use App\Register;
use Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;



class RegisterController extends Controller
{
    //

    public function store()
    {
    	 //echo "test here"; 

    	$data=Input::except(array('token'));

    	//var_dump($data);

    	$rule=array(
    		'username'=>'required',
    		'email'=>'required|email',
    		'password'=>'required|min:6',
    		'cpassword'=>'required|same:password'
    		);

    	$message=array(
    		'cpassword.required'=>'the confirm password is required',
    		'cpassword.min'=>'the confirm password must be atleast 6 characters',
    		'cpassword.min'=>'the confirm password and password must be same',
    		);

    	$validator=validator::make($data,$rule,$message);


    	if($validator->fails()) 
    	{

    		return Redirect::to('register')->withErrors($validator);
    	}else{
    		
    		Register::formstore(Input::except(array('_token','cpassword')));
    		
    		return Redirect::to('register')->with('success','successfully registered');

    	}

    }

    public function login()
    {
        // echo "login function"; = for testing purpose only!

        $data=Input::except(array('token'));

        //var_dump($data); = for testing purpose only!

        $rule=array(
            
            'email'=>'required|email',
            'password'=>'required',
            
            );

       
        $validator=validator::make($data,$rule);


        if($validator->fails()) 
            {
                return Redirect::to('signin')->withErrors($validator);
            }
            else
            {
                // var_dump($data); = for testing purpose only!
                // $data=Input::except(array('token'));

                $userdata=array(
                    'email'=>Input::get('email'), 
                    'password'=>Input::get('password')
                    );

             if(Auth::attempt($userdata))
             {  
                // dito pupunta pag correct log in 
                // User moddels table col match with data 
                // echo "yes match";
                return Redirect::to('blog');

             }
                else
             {

                // dito pupunta pag mali log in
                // return Redirect::to('signin');
                //echo "no match";
                return Redirect::to('signin');
             }
        }
    }
}

