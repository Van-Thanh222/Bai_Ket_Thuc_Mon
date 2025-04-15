
<div class="brand-wrapper">
    @foreach($trademarks as $trademark)
        <a href="{{ route('products.byTrademark',$trademark->id) }}"><div class="brand-box">
            <img src="{{ asset($trademark->avatar) }}" alt="{{ $trademark->name }}">
        </div></a>
    @endforeach
</div>
