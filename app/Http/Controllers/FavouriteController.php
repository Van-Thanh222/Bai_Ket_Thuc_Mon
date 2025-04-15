<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use App\Models\Slide;
use App\Models\ProductType;
use App\Models\Cart;
use App\Models\Trademark;
use App\Models\User;
use App\Models\Product;


class FavouriteController extends Controller
{
    public function addFavourite($productId)
{
    $userId = Auth::id();

    // Kiểm tra đã tồn tại hay chưa
    $favourite = Favourite::where('id_user', $userId)
                          ->where('id_product', $productId)
                          ->first();

    if ($favourite) {
        // Nếu đã có thì xóa
        $favourite->delete();
        return redirect()->back()->with('success', 'Đã xóa khỏi danh sách yêu thích!');
    } else {
        // Nếu chưa có thì thêm
        Favourite::create([
            'id_user' => $userId,
            'id_product' => $productId,
        ]);
        return redirect()->back()->with('success', 'Đã thêm vào danh sách yêu thích!');
    }
}
public function index()
{
    $slides = Slide::all();
    $user = Auth::user();

    if ($user) {
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        // Tính tổng tiền
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });
    } else {
        // Nếu chưa đăng nhập
        $cartItems = collect();
        $total = 0;
    }

    $productTypes = ProductType::all();

    $userId = auth()->id();

    $favourites = Favourite::with('product')
                    ->where('id_user', $userId)
                    ->get();
    $trademarks = Trademark::all();

    return view('user.home.trangyeuthich', compact('favourites', 'cartItems', 'total', 'productTypes', 'slides', 'trademarks'));
}


}
