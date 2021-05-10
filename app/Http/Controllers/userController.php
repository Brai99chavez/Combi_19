<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;

class userController extends Controller
{
    
    public function autenticacion(loginRequest $request){


        // return $request->only('email','contraseña');
        return redirect()->route('homeUser');
    } //

    public function homeUser(){

        
        return view('user.userHome');
    } //



}
