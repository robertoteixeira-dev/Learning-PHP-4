<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'role' => ['nullable', 'string'],
        ]);

        $user = Users::create($attributes);
        auth()->login($user);
        //Auth::attempt($user);
        //Auth::login($user);

        return redirect('/products')->with('success', 'Your account has been created.');
    }

}
