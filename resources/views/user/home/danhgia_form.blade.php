@extends('layout.master')

@section('content')
<div class="container">
    <h2>Đánh giá sản phẩm</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('danhgia.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="id_product" value="{{ $id_product }}">

        <div class="form-group">
            <label for="sao">Chấm điểm (1-5 ⭐):</label>
            <select name="sao" class="form-control" required>
                <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                <option value="4">⭐️⭐️⭐️⭐️</option>
                <option value="3">⭐️⭐️⭐️</option>
                <option value="2">⭐️⭐️</option>
                <option value="1">⭐️</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="danhgia">Nội dung đánh giá:</label>
            <textarea name="danhgia" class="form-control" rows="4" placeholder="Bạn thấy sản phẩm thế nào?"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Gửi đánh giá</button>
    </form>
</div>
@endsection
