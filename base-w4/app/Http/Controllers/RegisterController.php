<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\View\Components\Error\Error;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;


class RegisterController extends Controller
{

    public function create(){
        return view('register.create');
    }

    public function store(){
        //create the user

        $attributes = request()->validate([
            'first_name' => 'required|min:3|max:255|unique:users,first_name',
            'last_name' => 'required|min:3|max:255|unique:users,last_name',
            'email' => 'required|email|max:255|unique:users,email',
        ]);


        $user = Users::create($attributes);

        //auth()->login($user);

        return redirect('/products')->with('success', 'Your account has been created.');
    }

}
