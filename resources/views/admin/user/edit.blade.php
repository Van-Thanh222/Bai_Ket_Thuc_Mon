@extends('admin.layout.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Chi tiết người dùng</h2>

    <div class="card shadow-sm rounded">
        <div class="row g-0">
            {{-- Cột ảnh avatar --}}
            <div class="col-md-4 text-center p-4 bg-light border-end">
                @if($user->avatar)
                    <img src="{{ asset('image/'.$user->avatar) }}" class="img-fluid rounded-circle shadow-sm mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                @else
                    <div class="text-muted">Không có avatar</div>
                @endif
                <h4 class="mt-2">{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->role == 'admin' ? 'Quản trị viên' : 'Người dùng' }}</p>
            </div>

            {{-- Cột thông tin --}}
            <div class="col-md-8">
                <div class="card-body p-4">
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>ID:</strong></div>
                        <div class="col-sm-8">{{ $user->id }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Email:</strong></div>
                        <div class="col-sm-8">{{ $user->email }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Xác thực email:</strong></div>
                        <div class="col-sm-8">{{ $user->email_verified_at ?? 'Chưa xác thực' }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Số điện thoại:</strong></div>
                        <div class="col-sm-8">{{ $user->phone }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Địa chỉ:</strong></div>
                        <div class="col-sm-8">{{ $user->address }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Ngày tạo:</strong></div>
                        <div class="col-sm-8">{{ $user->created_at }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Cập nhật lúc:</strong></div>
                        <div class="col-sm-8">{{ $user->updated_at }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Remember Token:</strong></div>
                        <div class="col-sm-8">{{ $user->remember_token ?? 'Không có' }}</div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">← Quay lại danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
