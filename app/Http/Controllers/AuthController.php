<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){

        $data['page'] = 'login';
        return view('authentications.login',$data);
    }

    public function register(){

        $data['page'] = 'register';
        return view('authentications.register',$data);
    }
}
