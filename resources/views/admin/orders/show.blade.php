@extends('admin.layout')

@section('content')

<div style="display:flex">

    {{-- SIDEBAR --}}
    <div style="width:250px;background:#2c3e50;color:white;height:100vh;padding:20px">
        <h3>Quản lý Shop</h3>

        <p><a href="/admin" style="color:white">Dashboard</a></p>
        <p><a href="/admin/products" style="color:white">Quản lý sản phẩm</a></p>
        <p><a href="/admin/categories" style="color:white">Quản lý danh mục</a></p>
        <p><a href="/admin/orders" style="color:white">Quản lý đơn hàng</a></p>
        <p><a href="/admin/users" style="color:white">Quản lý user</a></p>
        <p><a href="/admin/blogs" style="color:white">Quản lý blog</a></p>
    </div>

    {{-- CONTENT --}}
    <div style="flex:1;padding:20px">

        <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>

        <div style="margin-top:20px">
            <p><strong>Khách hàng:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->phone }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
            <p><strong>Ngày đặt:</strong> {{ $order->created_at }}</p>
        </div>

        <h3>Sản phẩm</h3>
        <table border="1" width="100%" cellpadding="10" style="margin-top:10px">
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>

            @foreach($order->orderDetails as $detail)
            <tr>
                <td>{{ $detail->product->name ?? '' }}</td>
                <td>{{ number_format($detail->price) }} VND</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ number_format($detail->quantity * $detail->price) }} VND</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="3"><strong>Tổng cộng:</strong></td>
                <td><strong>{{ number_format($order->total) }} VND</strong></td>
            </tr>
        </table>

        <a href="/admin/orders" class="btn-order" style="display:inline-block;margin-top:20px">Quay lại</a>

    </div>

</div>

@endsection