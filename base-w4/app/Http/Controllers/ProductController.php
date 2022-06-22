<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function index(Products $products){
        $search = request()->query('search');
        $sort = request()->query('sort');

        if($search){
            $products = Products::where('title', 'like', "%{$search}%")
            ->orWhere('unit_price', 'like', "%{$search}%")->paginate(10)->withQueryString();
        }elseif($sort && $sort == 'price_asc'){
            $products = Products::orderBy('unit_price', 'asc')->paginate(10)->withQueryString();
        }elseif($sort && $sort == 'price_desc'){
            $products = Products::orderBy('unit_price', 'desc')->paginate(10)->withQueryString();
        }else{
            $products = Products::paginate(10)->withQueryString();
        }

        return view('products', [
            'products' => $products,
        ]);
    }

    public function detail($id){
        $detail = Products::find($id);

        return view('detail', [
            'product' => $detail
        ]);
    }

}
