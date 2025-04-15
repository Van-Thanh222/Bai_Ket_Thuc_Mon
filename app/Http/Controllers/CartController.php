<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Trademark;

class CartController extends Controller
{


    public function showCart()
    {
        $user = Auth::user();
        $trademarks = Trademark::all();
        // Lấy danh sách sản phẩm trong giỏ hàng của user
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();
    
        // Tính tổng tiền
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });
    
        // Lưu thông tin giỏ hàng vào session
        session(['cart' => [
            'items' => $cartItems,
            'total' => $total,
            'totalQty' => $cartItems->sum('quantity'),
        ]]);
        $productTypes = ProductType::all();
    
        return view('user.home', compact('cartItems', 'total', 'productTypes', 'trademarks'));
    }
    
    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();
    
        // Lấy sản phẩm
        $product = Product::findOrFail($productId);
    
        // Kiểm tra giỏ hàng đã có sản phẩm chưa
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->first();
    
        if ($cartItem) {
            // Nếu đã có -> tăng số lượng
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Nếu chưa có -> thêm mới
            Cart::create([
                'user_id'    => $user->id,
                'product_id' => $product->id,
                'quantity'   => 1,
                'unit_price' => $product->promotion_price ?? $product->price,
            ]);
        }
    
        // Cập nhật lại session giỏ hàng
        $this->updateCartSession($user);
    
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }
    
    private function updateCartSession($user)
    {
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();
    
        // Tính tổng tiền
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });
    
        // Lưu giỏ hàng vào session
        session(['cart' => [
            'items' => $cartItems,
            'total' => $total,
            'totalQty' => $cartItems->sum('quantity'),
        ]]);
    }
    public function removeFromCart($productId)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thực hiện thao tác.');
    }

    // Tìm và xóa sản phẩm trong giỏ hàng
    Cart::where('user_id', $user->id)
        ->where('product_id', $productId)
        ->delete();

    // Cập nhật lại session giỏ hàng
    $this->updateCartSession($user);

    return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
}

}    
