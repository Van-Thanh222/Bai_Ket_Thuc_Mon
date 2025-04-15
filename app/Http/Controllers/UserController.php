<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'phone'    => 'nullable|string|max:20',
            'role'     => 'nullable|string|in:user,admin',
            'address'  => 'nullable|string|max:255',
            'avatar'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
    
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $avatarName = time() . '_' . $file->getClientOriginalName(); 
            $file->move(public_path('image'), $avatarName); 
            $data['avatar'] = $avatarName;
        }
    
        User::create($data);
    
        return redirect()->route('users.index')->with('success', 'Thêm người dùng thành công!');
    }
    

    // public function edit(User $user)
    // {
    //     return view('admin.user.edit', compact('user'));
    // }

    public function update(Request $request, User $user)
{
    $request->validate([
        'role' => 'required|string|in:user,admin',
    ]);

    $user->update([
        'role' => $request->role,
    ]);

    return redirect()->route('users.index')->with('success', 'Cập nhật vai trò thành công!');
}


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Xóa người dùng thành công!');
    }
    public function show($id)
{
    $user = User::findOrFail($id);
    return view('admin.user.edit', compact('user'));
}
}
