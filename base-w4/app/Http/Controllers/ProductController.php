<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Products $products){

        $search = request()->query('search');
        $sort = request()->query('sort');

        if($search){
            $products =  Products::where(function($query) use ($search) {
                return $query->where('title', 'like' , "%{$search}%")->orWhere('unit_price', 'like', "%{$search}%");
            })
            ->where('is_visible', 1)
            ->paginate(10)
            ->withQueryString();

        }elseif($sort && $sort == 'price_asc'){
            $products = Products::where('is_visible', 1)->orderBy('unit_price', 'asc')->paginate(10)->withQueryString();
        }elseif($sort && $sort == 'price_desc'){
            $products = Products::where('is_visible', 1)->orderBy('unit_price', 'desc')->paginate(10)->withQueryString();
        }else{
            $products = Products::where('is_visible', 1)->paginate(10)->withQueryString();
        }

        return view('products', [
            'products' => $products,
        ]);
    }

    public function detail(Products $product){
       // $detail = Products::find($id);

        return view('detail', [
            'product' => $product
        ]);
    }

    public function create(){

        return view('products.create', []);
    }

    public function store(){

        $attributes = request()->validate([
            'type' => 'required|min:3|max:255',
            'title' => 'required|min:3|max:255|unique:products,title',
            'description' => 'required|min:5|max:255',
            'unit_price' => 'required'
        ]);

        Products::create($attributes);

        return redirect('admin/products')->with('success', 'Product created.');
    }

}
