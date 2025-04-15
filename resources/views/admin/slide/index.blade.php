@extends('admin.layout.master') {{-- hoặc dùng thẻ HTML cơ bản --}}

@section('content')
<div class="container mt-4">
    <h2>Danh sách Slide</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('slides.create') }}" class="btn btn-primary mb-3">Thêm Slide</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slides as $slide)
                <tr>
                    <td>{{ $slide->name }}</td>
                    <td><img src="{{ asset('image/' . $slide->image) }}" width="150"></td>
                    <td>
                        <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('slides.destroy', $slide->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
