@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Danh sách phản hồi khách hàng</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $index => $contact)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ Str::limit($contact->message, 50) }}</td>
                    <td>
                        @if($contact->status == 1)
                            <span class="badge bg-success">Đã phản hồi</span>
                        @else
                            <span class="badge bg-warning text-dark">Chưa phản hồi</span>
                        @endif
                    </td>
                    <td>
                        @if($contact->status == 0)
                            <a href="{{ route('admin.contacts.replyForm', $contact->id) }}" class="btn btn-sm btn-primary">Phản hồi</a>
                        @endif
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xóa phản hồi?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có phản hồi nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
