@extends('layouts.app')

@section('content')

<h2 style="text-align:center">Sản phẩm</h2>

<div class="product-grid">

    @forelse($products as $p)
        <div class="product-card">

            <img src="{{ asset('img/' . $p->image) }}" alt="">

            <h3>{{ $p->name }}</h3>

            <p>{{ number_format($p->price) }} VND</p>

            <a href="{{ url('/add-to-cart/'.$p->id) }}">
    Thêm giỏ hàng
</a>

        </div>
    @empty
        <p>Không có sản phẩm</p>
    @endforelse

</div>

@endsection