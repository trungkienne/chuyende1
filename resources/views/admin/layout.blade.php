<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dashboard - Cafe Shop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        .card {
            padding: 20px;
            border-radius: 8px;
            color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card.red { background: linear-gradient(135deg, #f093fb, #f5576c); }
        .card.blue { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .card.green { background: linear-gradient(135deg, #43e97b, #38f9d7); }
        .card.orange { background: linear-gradient(135deg, #fa709a, #fee140); }

        .card h3 { font-size: 14px; opacity: 0.9; }
        .card h2 { font-size: 28px; }
    </style>
</head>

<body>

<!-- HEADER -->
<section id="header">
    <a href="/">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
    </a>

    <ul id="navbar">

        <!-- Trang chủ -->
        <li><a href="/">Trang chủ</a></li>

        <!-- Shop -->
        <li><a href="/shop">Cửa hàng</a></li>

        <!-- Giỏ hàng -->
        <li>
            <a href="/cart">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </li>

        <!-- AUTH -->
        @auth

            <!-- Tên user -->
            <li style="color:white;">
                Xin chào, {{ auth()->user()->name }}
            </li>

            <!-- ADMIN -->
            @if(auth()->user()->role === 'admin')
                <li><a href="/admin">Admin</a></li>
            @endif

            <!-- LOGOUT -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        style="background:none; border:none; color:white; cursor:pointer;">
                        Đăng xuất
                    </button>
                </form>
            </li>

        @else

            <!-- CHƯA LOGIN -->
            <li><a href="/login">Đăng nhập</a></li>
            <li><a href="/register">Đăng ký</a></li>

        @endauth

    </ul>
</section>

<!-- MAIN -->
<main style="padding: 20px;">
    @yield('content')
</main>

<!-- FOOTER -->
<section id="footer">
    <div class="section-p1">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address</strong>: Hà Nội</p>
            <p><strong>Phone</strong>: 0346365181</p>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Privacy Policy</a>
        </div>

        <div class="col">
            <h4>Account</h4>
            <a href="/login">Login</a>
            <a href="/cart">Cart</a>
        </div>

        <div class="col install">
            <h4>Thanh toán</h4>
            <img src="{{ asset('img/pay/pay.png') }}" alt="">
        </div>
    </div>

    <div class="section-p1">
        <div class="copyright">
            <p>© Cafe Shop</p>
        </div>
    </div>
</section>

</body>
</html>