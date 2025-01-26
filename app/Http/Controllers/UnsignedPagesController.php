<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnsignedPagesController extends Controller
{

    public function welcome(){

        $data['page'] = 'home';
        return view('welcome',$data);
    }
}
