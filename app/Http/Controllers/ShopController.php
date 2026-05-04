<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index()
{
    $products = Product::all();
    $categories = Category::all();

    return view('shop.index', compact('products', 'categories'));
}

public function category($id)
{
    $categories = Category::all();
    $products = Product::where('category_id', $id)->get();

    return view('shop.index', compact('products', 'categories'));
}
}
