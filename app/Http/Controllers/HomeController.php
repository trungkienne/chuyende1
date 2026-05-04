<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
class HomeController extends Controller
{
    public function index()
{
    $categories = Category::all();
    $products = Product::all();
    $blogs = Blog::all();
    $isLoggedIn = Auth::check();
    $fullname = $isLoggedIn ? Auth::user()->name : '';

    return view('home', compact('categories', 'products', 'blogs', 'isLoggedIn', 'fullname'));
}
}