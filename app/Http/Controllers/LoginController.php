<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // logout
    public function  logout( Request $request){

        $request->session()->invalidate();

        return redirect('/login')->with('login', 'cerro sesión correctamente');

    }
}
