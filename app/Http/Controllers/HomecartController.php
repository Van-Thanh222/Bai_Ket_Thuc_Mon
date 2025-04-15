<?php

namespace App\Http\Controllers;
    use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductType;
use Illuminate\Support\Facades\View;
use App\Models\Trademark;




class HomecartController extends Controller
{

public function index()
{
 
    $slides = Slide::all();
    $user = Auth::user();
    // Lấy danh sách sản phẩm trong giỏ hàng của user
    $cartItems = Cart::with('product')
        ->where('user_id', $user->id)
        ->get();

    // Tính tổng tiền
    $total = $cartItems->sum(function ($item) {
        return $item->quantity * $item->unit_price;
    });
    $productTypes = ProductType::all();
    $trademarks = Trademark::all();
    $carts = Cart::with('product')->where('user_id', auth()->id())->get();
    return view('user.home.cart', compact('carts', 'total', 'slides', 'productTypes', 'cartItems', 'trademarks'));
}

public function update(Request $request, $id)
{
    $request->validate(['quantity' => 'required|integer|min:1']);
    $cart = Cart::findOrFail($id);
    $cart->update(['quantity' => $request->quantity]);

    return back()->with('success', 'Cập nhật số lượng thành công!');
}

public function destroy($id)
{
    $cart = Cart::findOrFail($id);
    $cart->delete();

    return back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
}

}
