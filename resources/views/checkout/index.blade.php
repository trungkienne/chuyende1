<h2>Thanh toán</h2>

<form action="{{ route('checkout.place') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Tên"><br>
    <input type="text" name="phone" placeholder="SĐT"><br>
    <input type="text" name="address" placeholder="Địa chỉ"><br>

    <h3>Đơn hàng</h3>

    @php $total = 0; @endphp

    @foreach($cart as $item)
        @php 
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
        @endphp

        <p>
            {{ $item['name'] }} x {{ $item['quantity'] }} 
            = {{ number_format($subtotal) }}
        </p>
    @endforeach

    <h3>Tổng: {{ number_format($total) }}</h3>

    <button type="submit">Đặt hàng</button>
</form>