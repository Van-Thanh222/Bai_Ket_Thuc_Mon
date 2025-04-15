<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $avatarName = null;
    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $avatarName = time() . '_' . $file->getClientOriginalName(); 
        $file->move(public_path('image'), $avatarName); 
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'role' => "user",
        'address' => $request->address,
        'avatar' => $avatarName, 
    ]);

    return redirect()->route('login.form')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập!');
}


    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        
            // Lấy người dùng hiện tại sau khi đăng nhập
            $user = Auth::user();
        
            // Kiểm tra role
            if ($user->role === 'admin') {
                return redirect('/users')->with('success', 'Đăng nhập thành công với quyền admin.');
            }
        
            return redirect()->intended('/')->with('success', 'Đăng nhập thành công.');
        }
        

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không đúng.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

