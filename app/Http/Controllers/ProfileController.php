<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\ProductType;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use App\Models\Trademark;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')
        ->where('user_id', $user->id)
        ->get();

    // Tính tổng tiền
    $total = $cartItems->sum(function ($item) {
        return $item->quantity * $item->unit_price;
    });
    $productTypes = ProductType::all();
    $slides = Slide::all();
    $trademarks = Trademark::all();
        return view('user.home.trangcanhan', compact('user', 'cartItems', 'total', 'productTypes', 'slides', 'trademarks'));
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'max:2048'],
        ]);
    
        $file = $request->file('avatar');
        $fileName = time() . '_' . $file->getClientOriginalName(); 
        $file->move(public_path('image'), $fileName); 
    
        auth()->user()->update(['avatar' =>  $fileName]); 
    
        return back()->with('success', 'Cập nhật ảnh đại diện thành công!');
    }
    

    public function updateName(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        auth()->user()->update(['name' => $request->name]);
        return back()->with('success', 'Name updated!');
    }

    public function updatePhone(Request $request)
    {
        $request->validate(['phone' => 'required|string|max:20']);
        auth()->user()->update(['phone' => $request->phone]);
        return back()->with('success', 'Phone updated!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'confirmed', Password::defaults()],
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated!');
    }
}

