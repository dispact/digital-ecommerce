<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('product.index', [
            'products' => Product::paginate(10)
        ]); 
    }

    public function show(Product $product) {
        return view('product.show', [
            'product' => $product
        ]);
    }

    public function create() {
        return view('product.create');
    }
}
