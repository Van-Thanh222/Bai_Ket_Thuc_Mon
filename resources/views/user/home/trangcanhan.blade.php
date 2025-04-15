@extends('layout.master')

@section('content')
<style>
    /* Avatar đẹp + giới hạn ảnh */
.avatar-wrapper {
    position: relative;
    width: 130px;
    height: 130px;
    margin: auto;
}

.avatar-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 9999px;
    border: 4px solid #e2e8f0; /* Tailwind's gray-300 */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.avatar-wrapper:hover img {
    border-color: #3b82f6; /* blue-500 */
}

.avatar-wrapper label {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #3b82f6;
    color: #fff;
    padding: 6px 10px;
    font-size: 12px;
    border-radius: 9999px;
    cursor: pointer;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
    transition: background-color 0.2s ease;
}

.avatar-wrapper label:hover {
    background-color: #2563eb;
}
/* Canh giữa toàn bộ form và các phần tử */
.form-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

/* Giới hạn độ dài input */
.input-field {
    max-width: 400px;
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    margin-bottom: 12px;
    transition: border 0.3s;
}

.input-field:focus {
    border-color: #3b82f6; /* border focus color */
    outline: none;
}

/* Nút button canh giữa */
.submit-btn {
    display: inline-block;
    padding: 12px 20px;
    border-radius: 8px;
    background-color: #3b82f6;
    color: #fff;
    font-weight: 600;
    text-align: center;
    width: auto;
    transition: background-color 0.3s;
}

.submit-btn:hover {
    background-color: #2563eb;
}

/* Form container */
.form-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

/* Container for sections */
.section-container {
    width: 100%;
    padding: 10px 15px;
    max-width: 450px;
    margin: 0 auto;
}


</style>
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-purple-100 p-6">
    <div class="w-full max-w-3xl bg-white p-8 rounded-2xl shadow-2xl space-y-10">

        <h2 class="text-4xl font-extrabold text-center text-gray-800">Thông tin cá nhân</h2>

        {{-- Thông báo --}}
        @if(session('success'))
            <div class="p-4 bg-green-100 text-green-700 rounded text-center shadow">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="p-4 bg-red-100 text-red-600 rounded shadow">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Avatar --}}
        <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="avatar-wrapper">
                <img id="avatarPreview" src="{{ asset('image/' . auth()->user()->avatar) }}" alt="Avatar">
                <label>
                    ✎
                    <input type="file" name="avatar" accept="image/*" class="hidden" onchange="previewAvatar(event); this.form.submit();">
                </label>
            </div>
        </form>

        {{-- Form Sections --}}
        <div class="form-container">
            {{-- Tên --}}
            <form action="{{ route('profile.name') }}" method="POST" class="section-container">
                @csrf
                <label class="font-medium text-gray-700">Tên</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                    class="input-field">
                <button type="submit" class="submit-btn">
                    Cập nhật tên
                </button>
            </form>

            {{-- Số điện thoại --}}
            <form action="{{ route('profile.phone') }}" method="POST" class="section-container">
                @csrf
                <label class="font-medium text-gray-700">Số điện thoại</label>
                <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                    class="input-field">
                <button type="submit" class="submit-btn">
                    Cập nhật số điện thoại
                </button>
            </form>

            {{-- Email --}}
            <div class="section-container">
                <label class="font-medium text-gray-700">Email</label>
                <input type="text" value="{{ auth()->user()->email }}"
                    class="input-field bg-gray-100 text-gray-600" disabled>
            </div>

            {{-- Đổi mật khẩu --}}
            <form action="{{ route('profile.password') }}" method="POST" class="section-container">
                @csrf
                <div>
                    <label class="font-medium text-gray-700">Mật khẩu hiện tại</label>
                    <input type="password" name="current_password" class="input-field">
                </div>

                <div>
                    <label class="font-medium text-gray-700">Mật khẩu mới</label>
                    <input type="password" name="new_password" class="input-field">
                </div>

                <div>
                    <label class="font-medium text-gray-700">Xác nhận mật khẩu mới</label>
                    <input type="password" name="new_password_confirmation" class="input-field">
                </div>

                <button type="submit" class="submit-btn">
                    Đổi mật khẩu
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Avatar preview script --}}
<script>
    function previewAvatar(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('avatarPreview').src = URL.createObjectURL(file);
        }
    }
</script>

@endsection
