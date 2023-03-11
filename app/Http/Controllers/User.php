<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    
    public function index()
    {
        // if($_POST){
        //     dd($_POST);
        //     $user = new \App\Models\User;
        //     $user->name = $_POST['name'];
        //     $user->email = $_POST['email'];
        //     $user->password = $_POST['password'];
        //     $user->save();
        // }

        return view('user.index');

    }
}
