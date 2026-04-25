<!DOCTYPE html>
<html>
<head>
    <title>Giỏ hàng</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .cart-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .qty-btn {
            width: 30px;
            height: 30px;
        }
        .cart-table th, .cart-table td {
            vertical-align: middle;
            text-align: center;
        }
        .total-box {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">🛒 Giỏ hàng</h2>

    @php $total = 0; @endphp

    @if($cart && count($cart) > 0)

    <table class="table table-bordered cart-table">
        <thead class="table-dark">
            <tr>
                <th>Ảnh</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Xóa</th>
            </tr>
        </thead>

        <tbody>
        @foreach($cart as $id => $item)

            @php 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            @endphp

            <tr>
                <td>
                    <img src="{{ asset('uploads/'.$item['image']) }}" class="cart-img">
                </td>

                <td>{{ $item['name'] }}</td>

                <td>{{ number_format($item['price']) }} đ</td>

                <td>
                    <!-- giảm -->
                    <form action="/update-cart" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="hidden" name="action" value="decrease">
                        <button class="btn btn-secondary qty-btn">-</button>
                    </form>

                    <span class="mx-2">{{ $item['quantity'] }}</span>

                    <!-- tăng -->
                    <form action="/update-cart" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="hidden" name="action" value="increase">
                        <button class="btn btn-secondary qty-btn">+</button>
                    </form>
                </td>

                <td>{{ number_format($subtotal) }} đ</td>

                <td>
                    <form action="/remove-cart" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button class="btn btn-danger">X</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

    <!-- tổng tiền -->
    <div class="total-box">
        <h4>Tổng tiền: <strong>{{ number_format($total) }} đ</strong></h4>

        <a href="/checkout" class="btn btn-success mt-2">
            Thanh toán
        </a>
    </div>

    @else

        <div class="alert alert-warning">
            Giỏ hàng trống!
        </div>

    @endif

</div>

</body>
</html>