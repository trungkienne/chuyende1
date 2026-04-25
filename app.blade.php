<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin - Cafe Shop</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        #header {
            background: #2c3e50;
            padding: 15px;
        }

        #navbar {
            list-style: none;
            display: flex;
            gap: 20px;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        #navbar li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        #navbar li a:hover {
            color: #f1c40f;
        }

        .user-box {
            color: white;
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        button.logout {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        button.logout:hover {
            color: red;
        }
    </style>
</head>

<body>

<section id="header">

    <a href="/">
        <img src="{{ asset('img/logo.png') }}" alt="logo" style="height:40px;">
    </a>

    <ul id="navbar">

        <!-- MENU ADMIN -->
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/products">Sản phẩm</a></li>
        <li><a href="/admin/categories">Danh mục</a></li>
        <li><a href="/admin/orders">Đơn hàng</a></li>
        <li><a href="/admin/users">User</a></li>
        <li><a href="/admin/blogs">Blog</a></li>

        <!-- AUTH -->
        @auth
            <div class="user-box">

                <span>Hi, {{ auth()->user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout" type="submit">Đăng xuất</button>
                </form>

            </div>
        @else
            <li><a href="/login">Đăng nhập</a></li>
            <li><a href="/register">Đăng ký</a></li>
        @endauth

    </ul>

</section>

<main style="padding:20px;">
    @yield('content')
</main>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>