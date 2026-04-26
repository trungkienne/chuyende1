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

        <h2>Thêm user</h2>

        <form action="/admin/users" method="POST" style="max-width:500px">
            @csrf

            <p>
                <label>Tên:</label><br>
                <input type="text" name="name" required style="width:100%;padding:8px">
            </p>

            <p>
                <label>Email:</label><br>
                <input type="email" name="email" required style="width:100%;padding:8px">
            </p>

            <p>
                <label>Mật khẩu:</label><br>
                <input type="password" name="password" required style="width:100%;padding:8px">
            </p>

            <p>
                <label>Vai trò:</label><br>
                <select name="role" style="width:100%;padding:8px">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </p>

            <button type="submit" class="btn-order">Thêm</button>
            <a href="/admin/users" class="btn-order" style="background:#666">Hủy</a>
        </form>

    </div>

</div>

@endsection