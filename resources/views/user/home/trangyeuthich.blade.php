@extends('layout.master')

@section('content')

<style>
    .product-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 15px;
        margin-bottom: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }

    .product-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .product-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        min-height: 48px;
    }

    .product-price {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .product-price del {
        color: #999;
        margin-right: 8px;
    }

    .product-price strong {
        color: #e53935;
        font-size: 18px;
    }

    .product-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 5px;
        flex-wrap: wrap;
    }

    .btn-detail {
        background-color: #f5f5f5;
        color: #333;
        border: none;
    }

    .btn-detail:hover {
        background-color: #e0e0e0;
    }

    @media (max-width: 768px) {
        .product-title {
            font-size: 16px;
        }

        .product-price {
            font-size: 14px;
        }

        .product-price strong {
            font-size: 16px;
        }
    }
</style>

<div class="container mt-4">
    <h3 class="mb-4 text-center">❤️ Sản phẩm yêu thích của bạn</h3>

    <div class="row">
        @forelse($favourites as $fav)
            <div class="col-md-4 d-flex">
                <div class="product-card w-100">
                    <img src="{{ asset($fav->product->image) }}" alt="{{ $fav->product->name }}" class="product-img">

                    <div class="product-title">{{ $fav->product->name }}</div>

                    <div class="product-price">
                        @if($fav->product->promotion_price > 0)
                            <del>{{ number_format($fav->product->price) }}đ</del>
                            <strong>{{ number_format($fav->product->promotion_price) }}đ</strong>
                        @else
                            <strong>{{ number_format($fav->product->price) }}đ</strong>
                        @endif
                    </div>

                    <div class="product-actions">
                        <a href="{{ route('product.detail', $fav->product->id) }}" class="btn btn-sm btn-detail">Chi tiết ></a>

                        <a href="{{ route('cart.add', $fav->product->id) }}" class="btn btn-sm btn-primary">🛒 Thêm</a>

                        <a href="{{ route('favourite.remove', $fav->product->id) }}" class="btn btn-sm btn-outline-danger">
                            Xóa ❤️
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center mt-5">
                <p class="text-muted">Bạn chưa thêm sản phẩm nào vào yêu thích.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection
