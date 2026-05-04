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

        <h2>Thêm sản phẩm</h2>

        <form method="POST" action="/admin/products" style="max-width:500px">
        @csrf

            <p>
                <label>Tên sản phẩm:</label><br>
                <input name="name" placeholder="Tên sản phẩm" required style="width:100%;padding:8px">
            </p>

            <p>
                <label>Giá:</label><br>
                <input name="price" placeholder="Giá" required style="width:100%;padding:8px">
            </p>

            <p>
                <label>Danh mục:</label><br>
                <select name="category_id" style="width:100%;padding:8px">
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </p>

            <button type="submit" class="btn-order">Thêm</button>
            <a href="/admin/products" class="btn-order" style="background:#666">Hủy</a>

        </form>

    </div>

</div>

@endsection