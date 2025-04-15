<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhGia;
use Illuminate\Support\Facades\Auth;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Cart;
use App\Models\Trademark;
use App\Models\User;
use App\Models\Order;
use App\Models\DiscountCode;
use App\Models\Favourite;
use App\Models\CartItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class DanhGiaController extends Controller
{
    public function showForm($id_product)
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
        return view('user.home.danhgia_form', compact('id_product', 'cartItems', 'total', 'productTypes', 'slides', 'trademarks'));
    }

    public function submit(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'id_product' => 'required|integer',
            'sao' => 'required|integer|min:1|max:5',
            'danhgia' => 'nullable|string|max:1000',
        ]);

        DanhGia::create([
            'id_product' => $request->id_product,
            'id_user' => $user->id,
            'sao' => $request->sao,
            'danhgia' => $request->danhgia,
        ]);

        return redirect()->back()->with('success', 'Cảm ơn bạn đã đánh giá sản phẩm!');
    }
    // CreateReviewsTable.php (Migration)

public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained(); // Mối quan hệ với sản phẩm
        $table->foreignId('user_id')->constrained(); // Mối quan hệ với người dùng
        $table->integer('rating'); // Điểm đánh giá
        $table->text('comment')->nullable(); // Bình luận (tuỳ chọn)
        $table->timestamps();
    });
}

}
