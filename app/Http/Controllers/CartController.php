<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Thêm vào giỏ hàng
    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    // Cập nhật số lượng
    public function update(Request $request)
{
    $cart = session()->get('cart');

    $id = $request->id;

    if($request->action == 'increase'){
        $cart[$id]['quantity']++;
    }

    if($request->action == 'decrease'){
        $cart[$id]['quantity']--;
        if($cart[$id]['quantity'] <= 0){
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);

    return redirect()->back();
}
    // Xóa sản phẩm
    public function remove(Request $request)
    {
        if($request->id){
            $cart = session()->get('cart');

            unset($cart[$request->id]);

            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    // Xóa tất cả giỏ hàng
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Đã xóa tất cả sản phẩm trong giỏ hàng!');
    }
}