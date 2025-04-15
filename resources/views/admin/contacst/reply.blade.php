@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Phản hồi khách hàng</h2>

    <div class="card p-4">
        <p><strong>Tên khách hàng:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Nội dung khách gửi:</strong></p>
        <p>{{ $contact->message }}</p>

        <form action="{{ route('admin.contacts.sendReply', $contact->id) }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="reply">Nội dung phản hồi</label>
                <textarea name="reply" id="reply" class="form-control" rows="5" required>{{ old('reply', $contact->reply) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Gửi phản hồi</button>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
        </form>
    </div>
</div>
@endsection
