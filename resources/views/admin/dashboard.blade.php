@extends('layouts.app')

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

        <h2>Dashboard - Quản lý Shop Cafe</h2>

        <div style="display:flex;gap:20px;margin-top:20px;flex-wrap:wrap">

            <div style="background:#ff6b6b;padding:20px;border-radius:10px;color:white">
                Tổng sản phẩm: {{ $totalProducts }}
            </div>

            <div style="background:#3498db;padding:20px;border-radius:10px;color:white">
                Tổng đơn hàng: {{ $totalOrders }}
            </div>

            <div style="background:#2ecc71;padding:20px;border-radius:10px;color:white">
                Tổng user: {{ $totalUsers }}
            </div>

            <div style="background:#9b59b6;padding:20px;border-radius:10px;color:white">
                Danh mục: {{ $totalCategories }}
            </div>

            <div style="background:#f39c12;padding:20px;border-radius:10px;color:white">
                Doanh thu: {{ number_format($revenue) }} VND
            </div>

            <div style="background:#1abc9c;padding:20px;border-radius:10px;color:white">
                Blog: {{ $totalBlogs }}
            </div>

        </div>

    </div>

</div>

@endsection