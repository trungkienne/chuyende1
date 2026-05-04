<!DOCTYPE html>
<html>
<head>
    <title>Giỏ hàng</title>
</head>
<body>

<h2>Giỏ hàng</h2>

@if(session('cart'))
    <table border="1" cellpadding="10">
        <tr>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Xóa</th>
        </tr>

        @php $total = 0; @endphp

        @foreach(session('cart') as $id => $item)
            @php $total += $item['price'] * $item['quantity']; @endphp

            <tr>
                <td>
                    <img src="{{ asset('uploads/'.$item['image']) }}" width="50">
                </td>

                <td>{{ $item['name'] }}</td>
                <td>{{ number_format($item['price']) }}đ</td>

                {{-- QUANTITY + / - --}}
                <td>
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">

                        <button type="submit" name="action" value="decrease">-</button>

                        {{ $item['quantity'] }}

                        <button type="submit" name="action" value="increase">+</button>
                    </form>
                </td>

                <td>{{ number_format($item['price'] * $item['quantity']) }}đ</td>

                <td>
                    <form action="{{ route('cart.remove') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Tổng tiền: {{ number_format($total) }}đ</h3>

    {{-- THANH TOÁN --}}
   <a href="{{ route('checkout') }}">Thanh toán</a>
        <button>Thanh toán</button>
    </a>

    <br><br>
    <a href="{{ route('cart.clear') }}">Xóa tất cả</a>

@else
    <p>Giỏ hàng trống</p>
@endif

</body>
</html>