<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class SessionsController extends Controller
{

    public function create(){
        return view('sessions.create');
    }

    public function store(){

        $attributes = request()->validate([
            'first_name' => 'required|exists:users,first_name',
            'last_name' => 'required|exists:users,last_name',
            'email' => 'required|exists:users,email',
        ]);

        $user = Users::where($attributes)->first();

        $remember = request()->filled('remember');

        if (Auth::loginUsingId($user['id'], $remember)){
            return redirect("/products")->with('success', 'Welcome Back!');
        }
    }

    public function destroy(){
        auth()->logout();

        return redirect('products')->with('success', 'Goodbye!');
    }
}
