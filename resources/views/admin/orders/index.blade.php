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

        <h2>Quản lý đơn hàng</h2>

        @if(session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif

        <table border="1" width="100%" cellpadding="10" style="margin-top:20px">
            <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th>Hành động</th>
            </tr>

            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ number_format($order->total) }} VND</td>
                <td>
                    @if($order->status == 'pending')
                        <span style="color:orange">Chờ xử lý</span>
                    @elseif($order->status == 'processing')
                        <span style="color:blue">Đang xử lý</span>
                    @elseif($order->status == 'completed')
                        <span style="color:green">Hoàn thành</span>
                    @elseif($order->status == 'cancelled')
                        <span style="color:red">Đã hủy</span>
                    @else
                        {{ $order->status ?? 'Chờ xử lý' }}
                    @endif
                </td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a href="/admin/orders/{{ $order->id }}">Chi tiết</a>
                    <a href="/admin/orders/{{ $order->id }}/edit">Sửa</a>

                    <form action="/admin/orders/{{ $order->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>

    </div>

</div>

@endsection