<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicController extends Controller
{   
    
    public function login(){
        return view('public.login');
    } //

    public function publicHome(){
        return view('public.publicHome');
    } //
    
}
