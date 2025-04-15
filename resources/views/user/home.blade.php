@extends('layout.master')

@section('content')

<style>
    /* Card sản phẩm */
    .product-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 30px;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    /* Hình ảnh sản phẩm */
    .product-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 12px;
    }

    /* Tiêu đề sản phẩm */
    .product-title {
        font-size: 18px;
        font-weight: 600;
        margin: 15px 0 10px;
        color: #333;
        min-height: 44px;
        text-align: center;
    }

    /* Giá sản phẩm */
    .product-price {
        font-size: 16px;
        margin-bottom: 15px;
        text-align: center;
    }

    .product-price del {
        color: #999;
        margin-right: 10px;
    }

    .product-price strong {
        color: #e60023;
        font-size: 18px;
    }

    /* Hành động sản phẩm (thêm vào giỏ hàng, yêu thích, chi tiết) */
    .product-actions {
        margin-top: auto;
        display: flex;
        justify-content: space-evenly;
        gap: 10px;
    }

    .btn-fav,
    .btn-cart,
    .btn-detail {
        padding: 8px 15px;
        font-size: 14px;
        border-radius: 8px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    /* Yêu thích sản phẩm */
    .btn-fav {
        background: #fce4ec;
        color: #e91e63;
    }

    .btn-fav:hover {
        background: #f8bbd0;
        color: #c2185b;
    }

    /* Thêm vào giỏ hàng */
    .btn-cart {
        background-color: #28a745;
        color: #fff;
    }

    .btn-cart:hover {
        background-color: #218838;
    }

    /* Chi tiết sản phẩm */
    .btn-detail {
        background-color: #007bff;
        color: #fff;
    }

    .btn-detail:hover {
        background-color: #0056b3;
    }

    /* Thương hiệu sản phẩm */
    .brand-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 40px;
    }

    .brand-box {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 70px;
        min-width: 120px;
        transition: all 0.3s ease;
    }

    .brand-box:hover {
        box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        transform: translateY(-4px);
    }

    .brand-box img {
        max-height: 50px;
        max-width: 120px;
        object-fit: contain;
    }
</style>

@include('user.home.trademark_index')

@php
    $sections = [
        'Tất cả sản phẩm' => $allProducts,
        'Sản phẩm mới' => $newProducts,
        'Sản phẩm Đề Nghị' => $topProducts,
        'Sản phẩm khuyến mãi' => $saleProducts,
    ];
@endphp

@foreach($sections as $title => $products)
    <h2 class="mt-5 mb-4 text-center text-uppercase font-weight-bold" style="color: #333;">{{ $title }}</h2>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 d-flex justify-content-center">
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

                        <a href="{{ route('product.detail', $product->id) }}" class="btn btn-sm btn-detail">Chi tiết &gt;</a>

                        @if (Auth::check())
                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-sm btn-cart">
                                🛒
                            </a>
                        @else
                            <a href="#" class="btn btn-sm btn-cart require-login-cart">
                                🛒
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center w-100">Không có sản phẩm.</p>
        @endforelse
    </div>
@endforeach

@endsection
