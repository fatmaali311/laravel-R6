<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\Common;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    use Common ;

    
    public function addProduct(){
        return view('add_product');
    }
   

    
    public function index(){
        $products = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('fashion_index', compact('products'));
    }
    
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
       
        $data['image'] =$this->uploadFile($request->image,'assets/images');
       Product::create($data);
       return "Product added successfully";
    }
}
