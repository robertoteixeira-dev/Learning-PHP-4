<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        Users::create($attributes);

        session()->flash('success', 'Your account has been created.');

        return redirect('/products');
    }
}
