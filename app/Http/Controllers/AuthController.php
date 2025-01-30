<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CountryCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller
{


    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function login(){

        $data['page'] = 'login';
        return view('authentications.login',$data);
    }

    public function logined(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = 'hatalı login';
            return redirect()->back()->with('error',$errors);
        }


        if(Auth::attempt(['email'=>$request->input('email'),
        'password'=>$request->input('password')])){
            return view('Authenticated.home');
        }else{
            return redirect()->back()->with('error','no user');
        }


    }



    public function register(){

        $data['page'] = 'register';
        $data['country_codes'] = CountryCode::all();

        return view('authentications.register',$data);
    }

    public function registered(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:25',
            'email' => 'required|unique:users|email',
            'phone_country_code' => 'nullable|string|max:5',
            'phone_number' => 'nullable|string|max:15',
            'password' => 'required|min:6|confirmed',
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = 'hatalı register';
            return redirect()->back()->with('error',$errors);
        }

        try {

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);

            if(isset($request->phone_number)){
                $user->phone_country_code = $request->phone_country_code;
                $user->phone_number = $request->phone_number;
                $user->save();
            }

            if($user){
                Auth::login($user);
                return view('authenticated.home');
            }

        } catch (\Error $error) {
            return redirect()->back()->with('error',$error);
        }








    }
}
