<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function index(Products $product){
        //$products = Products::all();
        $search = request()->query('search');

        if($search){
            $products = Products::where('title', 'like', "%{$search}%")
            ->orWhere('unit_price', 'like', "%{$search}%")->simplePaginate(10);
        }else{
            $products = Products::simplePaginate(10);
        }

        return view('products', [
            'products' => $products,
        ]);
    }


    /*public function index(Products $product){
        $product = Products::all()->filter(request(['search']))->get();

        return view('products', [
            'products' => $product,
        ]);
    }

    public function show(Products $products){
       // $products = Products::all()->take(10);

        $products = Products::all();

        return view('products', [
            'products' => $products,
        ]);
    }*/


}
