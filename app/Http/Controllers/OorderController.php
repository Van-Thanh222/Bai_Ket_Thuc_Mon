<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
use App\Models\Slide;

use App\Models\ProductType;

use App\Models\Cart;
use App\Models\Product;
use App\Models\DiscountCode;
use App\Models\Trademark;

class OorderController extends Controller
{
    // Hiển thị tất cả các đơn hàng hoặc lọc theo trạng thái
    public function index(Request $request)
    {
        $status = $request->get('status');
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
        if ($status) {
            // Nếu có tham số 'status', chỉ lấy các đơn hàng có trạng thái tương ứng
            $orders = Order::where('user_id', Auth::id())
                           ->where('status', $status)
                           ->get();
        } else {
            // Nếu không có tham số 'status', lấy tất cả đơn hàng
            $orders = Order::where('user_id', Auth::id())->get();
        }
        $trademarks = Trademark::all();

        return view('user.home.donhang', compact('orders', 'cartItems', 'total', 'productTypes', 'slides', 'trademarks'));
    }
    public function showw($id)
    {
        $trademarks = Trademark::all();
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

        // Lấy đơn hàng theo ID và kiểm tra xem đó có phải là đơn hàng của người dùng hiện tại không
        $order = Order::where('id', $id)
                      ->where('user_id', Auth::id())
                      ->firstOrFail();

        return view('user.home.chitietdonhang', compact('order', 'cartItems', 'total', 'productTypes', 'slides', 'trademarks'));
    }
    public function orderNow($productId)
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('warning', 'Vui lòng đăng nhập để đặt hàng.');
    }

    $product = Product::findOrFail($productId);

    // Tìm cart item đã có (nếu có)
    $cart = Cart::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();

    if ($cart) {
        // Nếu đã có trong giỏ, tăng số lượng lên 1
        $cart->quantity = 1;
        $cart->save();
    } else {
        // Nếu chưa có, thêm mới
        $cart = Cart::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'quantity' => 1,
            'unit_price' => $product->promotion_price ?? $product->price,
        ]);
    }
    

    // Chuyển sang trang form đặt hàng
    return redirect()->route('order.create', ['cart' => $cart->id]);

}

}

