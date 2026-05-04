<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    // Hiển thị form checkout
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    // Xử lý đặt hàng
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $cart = session()->get('cart');

        if(!$cart || count($cart) == 0){
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        // Tính tổng
        $total = 0;
        foreach($cart as $item){
            $total += $item['price'] * $item['quantity'];
        }

        // Lưu order
        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total
        ]);

        // Lưu chi tiết
        foreach($cart as $id => $item){
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        // Xóa giỏ hàng
        session()->forget('cart');

        return redirect('/')->with('success', 'Đặt hàng thành công!');
    }
}
