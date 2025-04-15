
<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href="#"><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
            <ul class="top-details menu-beta l-inline">
    @auth
        {{-- Nếu đã đăng nhập --}}
        <li><a href="{{ route('favourite.index') }}">Yêu thích</a></li>
        <li><a href="{{ route('profile.edit') }}"><i class="fa fa-user"></i> Chào bạn {{ Auth::user()->name }}</a></li>
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> Đăng xuất
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @else
        {{-- Nếu chưa đăng nhập --}}
        <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Đăng ký</a></li>
        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
    @endauth

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo">
                <img src="{{ asset('image/logo.png') }}" width="200px"  alt="Logo">

                </a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                <form action="{{ route('home.search') }}" method="GET">
    <input type="text" name="s" placeholder="Tìm kiếm sản phẩm..." value="{{ request()->input('s') }}">
    <button type="submit">Tìm kiếm</button>
</form>

                </div>
                @if(Auth::check())
                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select">
                        <i class="fa fa-shopping-cart"></i>
Giỏ hàng
<i class="fa fa-chevron-down"></i>


                        </div>
                        <div class="beta-dropdown cart-body">
    @forelse($cartItems as $item)
        <div class="cart-item">
            <div class="media">
                <a class="pull-left" href="#">
                    <img src="{{ asset($item->product->image) }}" alt="">
                </a>
                <div class="media-body">
                    <span class="cart-item-title">{{ $item->product->name }}</span>
                    <span class="cart-item-amount">
                        {{ $item->quantity }} * 
                        <span>{{ number_format($item->unit_price, 2) }}</span>
                        <a href="{{ route('cart.remove', $item->product_id) }}" class="remove-item"
   onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')">
    <i class="fa fa-times" style="color: red; font-size: 20px;"></i>
</a>

                    </span>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center">Giỏ hàng trống</p>
        <div class="center">
                <div class="space10">&nbsp;</div>
                <a href="{{ route('orderss.trangchinh') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                <a href="{{ route('cart.index') }}" class="beta-btn primary text-center">Sửa Giỏ Hàng <i class="fa fa-chevron-right"></i></a>
            </div>
    @endforelse
@else
<div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select">
                        <i class="fa fa-shopping-cart"></i>
Giỏ hàng 
<i class="fa fa-chevron-down"></i>
@endif


    @if(count($cartItems))
        <div class="cart-caption">
            <div class="cart-total text-right">
                Tổng tiền: <span class="cart-total-value">{{ number_format($total, 2) }}VND</span>
            </div>
            <div class="clearfix"></div>
            <div class="center">
                <div class="space10">&nbsp;</div>
                <a href="{{ route('orderss.trangchinh') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                <a href="{{ route('cart.index') }}" class="beta-btn primary text-center">Sửa Giỏ Hàng <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    @endif
</div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#">
                <span class='beta-menu-toggle-text'>Menu</span> 
                <i class="fa fa-bars"></i>
            </a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
    <ul class="sub-menu">
    <strong>Loại sản phẩm</strong>

        @foreach($productTypes as $type)
            <li>
                <a href="{{ route('products.byType', ['id' => $type->id]) }}">
                    {{ $type->name }}
                </a>
            </li>
        @endforeach
        <strong>Thương hiệu</strong>
        @foreach($trademarks as $tm)
    <li>
        <a href="{{ route('products.byTrademark', ['id' => $tm->id]) }}">
            {{ $tm->name }}
        </a>
    </li>
@endforeach

    </ul>
</li>

                    <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{ route('contact.form') }}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
    </div>
</div>


