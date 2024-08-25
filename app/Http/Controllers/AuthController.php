<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            
        ]);
    }
    public function login(){
        return 'login';
    }
    public function logout(){
        return 'logout';
    }
}
