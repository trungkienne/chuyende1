<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('/admin/products')->with('success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        Product::findOrFail($id)->update($request->all());
        return redirect('/admin/products')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return back()->with('success', 'Xóa thành công');
    }
}