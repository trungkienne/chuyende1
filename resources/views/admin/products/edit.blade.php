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

        <h2>Sửa sản phẩm</h2>

        <form method="POST" action="/admin/products/{{ $product->id }}" style="max-width:500px">
        @csrf
        @method('PUT')

            <p>
                <label>Tên sản phẩm:</label><br>
                <input name="name" value="{{ $product->name }}" required style="width:100%;padding:8px">
            </p>

            <p>
                <label>Giá:</label><br>
                <input name="price" value="{{ $product->price }}" required style="width:100%;padding:8px">
            </p>

            <p>
                <label>Danh mục:</label><br>
                <select name="category_id" style="width:100%;padding:8px">
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}"
                            {{ $product->category_id == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </p>

            <button type="submit" class="btn-order">Cập nhật</button>
            <a href="/admin/products" class="btn-order" style="background:#666">Hủy</a>

        </form>

    </div>

</div>

@endsection