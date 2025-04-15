@extends('layout.master')

@section('content')

<style>
    .product-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        padding: 15px;
        margin-bottom: 25px;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .product-img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 10px;
    }

    .product-title {
        font-size: 16px;
        font-weight: 600;
        margin: 10px 0 6px;
        min-height: 44px;
        color: #333;
    }

    .product-price {
        font-size: 15px;
        margin-bottom: 10px;
    }

    .product-price del {
        color: #999;
        margin-right: 5px;
    }

    .product-price strong {
        color: #e60023;
    }

    .product-actions {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 6px;
    }

    .btn-fav {
        background: #fce4ec;
        color: #e91e63;
        border: none;
    }

    .btn-fav:hover {
        background: #f8bbd0;
        color: #c2185b;
    }

    .btn-cart {
        background-color: #28a745;
        color: #fff;
        border: none;
    }

    .btn-cart:hover {
        background-color: #218838;
    }

    .btn-detail {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .btn-detail:hover {
        background-color: #0056b3;
    }
</style>

@php
    $sections = [
        'Kết quả tìm kiếm cho: "' . request()->input('s') . '"' => $results,
    ];
@endphp

@foreach($sections as $title => $products)
    <h2 class="mt-4 mb-3">{{ $title }}</h2>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 d-flex">
                <div class="product-card w-100">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-img">
                    
                    <div class="product-title">{{ $product->name }}</div>

                    <div class="product-price">
                        @if($product->promotion_price > 0)
                            <del>{{ number_format($product->price) }}đ</del>
                            <strong>{{ number_format($product->promotion_price) }}đ</strong>
                        @else
                            <strong>{{ number_format($product->price) }}đ</strong>
                        @endif
                    </div>

                    <div class="product-actions">
    @php
        $isFavourite = in_array($product->id, $favourites ?? []);
    @endphp

    @if (Auth::check())
        <a href="{{ route('favourite.add', $product->id) }}"
           class="btn btn-sm btn-fav"
           style="color: {{ $isFavourite ? 'red' : 'black' }};">
            {{ $isFavourite ? '❤️' : '🖤' }}
        </a>
    @else
        <a href="#" class="btn btn-sm btn-fav require-login">🖤</a>
    @endif

    <a href="{{ route('product.detail',$product->id) }}" class="btn btn-sm btn-detail">Chi tiết &gt;</a>

    @if (Auth::check())
        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">
            🛒
        </a>
    @else
        <a href="#" class="btn btn-primary require-login-cart">
            🛒
        </a>
    @endif
</div>

                </div>
            </div>
        @empty
            <p class="text-muted">Không có sản phẩm nào phù hợp với tìm kiếm của bạn.</p>
        @endforelse
    </div>
@endforeach

@endsection
