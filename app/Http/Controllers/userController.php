<?php

namespace App\Http\Controllers;


class userController extends Controller
{
    public function homeUser(){

        return view('user.userHome');
    } //

    public function editarPerfilCliente(){

        return view('user.editarPerfilCliente');
    }
}
