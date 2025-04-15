<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Slide;
use App\Models\ProductType;
use App\Models\Product;
use App\Mail\OrderSuccessMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Trademark;

class HomeHomeorderController extends Controller
{
    public function create(Cart $cart)
    {
        $discountCodes = DiscountCode::all();
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
        return view('user.home.order_form', compact('cart', 'slides', 'productTypes', 'cartItems', 'total', 'user', 'discountCodes', 'trademarks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $cart = Cart::with('product')->findOrFail($request->cart_id);

        // Áp dụng mã giảm giá
        $discount = null;
        $discountPrice = 0;

        if ($request->filled('discount_code')) {
            $discount = DiscountCode::where('name', $request->discount_code)->first();
            if ($discount) {
                $discountPrice = $discount->price ?? 0;
            }
        }

        $order = Order::create([
            'order_code' => 'ORD' . strtoupper(uniqid()),
            'user_id' => Auth::id(),
            'product_id' => $cart->product_id,
            'product_name' => $cart->product->name,
            'quantity' => $cart->quantity,
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'customer_address' => $request->address,
            'Original_price' => $cart->product->price,
            'Promotional_price' => $cart->product->promotion_price,
            'Total_Price' => ($cart->product->promotion_price * $cart->quantity) - $discountPrice,
            'status' => 1,
            'note' => $request->note,
            'discount_code_id' => $discount?->id,
            'discount_price' => $discountPrice
        ]);

        $cart->delete();
        Mail::to($request->email)->send(new OrderSuccessMail($order));


        return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
    }
}

