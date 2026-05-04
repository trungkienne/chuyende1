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

        <h2>Quản lý danh mục</h2>

        <a href="/admin/categories/create" class="btn-order">+ Thêm danh mục</a>

        @if(session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif

        <table border="1" width="100%" cellpadding="10" style="margin-top:20px">
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>

            @foreach($categories as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->description }}</td>
                <td>
                    <a href="/admin/categories/{{ $c->id }}/edit">Sửa</a>

                    <form action="/admin/categories/{{ $c->id }}" method="POST" style="display:inline">
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