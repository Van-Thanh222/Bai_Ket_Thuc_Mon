<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Trademark;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourite;
use App\Models\ProductType;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $favourites = [];

        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = Cart::with('product')
                ->where('user_id', $user->id)
                ->get();
    
            $total = $cartItems->sum(function ($item) {
                return $item->quantity * $item->unit_price;
            });
    
            $favourites = Favourite::where('id_user', $user->id)->pluck('id_product')->toArray();
        }
    
        $slides = Slide::all();
        $user = Auth::user(); 
        $productTypes = ProductType::all();
        $user = auth()->user();
        $trademarks = Trademark::all();
        $allProducts = Product::all();

        // Sản phẩm mới
        $newProducts = Product::where('new', 1)->get();

        // Sản phẩm nổi bật (ví dụ: field "top" = 1)
        $topProducts = Product::where('top', 1)->get();

        // Sản phẩm khuyến mãi (có promotion_price > 0)
        $saleProducts = Product::where('promotion_price', '>', 0)->get();
        $trademarks = Trademark::all();
        // Lấy danh sách sản phẩm yêu thích của user
        // Lấy danh sách sản phẩm trong giỏ hàng của user
    
        if ($user) {
            $cartItems = Cart::with('product')
                ->where('user_id', $user->id)
                ->get();
    
            $total = $cartItems->sum(function ($item) {
                return $item->quantity * $item->unit_price;
            });
        } else {
            $cartItems = collect(); // trả về danh sách rỗng
            $total = 0;
        }
    
        $allProducts = Product::all();
        $slides = Slide::all();
    
        return view('user.home', compact('cartItems', 'total', 'allProducts', 'slides', 'productTypes', 'trademarks', 'newProducts', 'topProducts', 'saleProducts', 'favourites'))
            ->with('slides', $slides)
            ->with('productTypes', $productTypes)
            ->with('trademarks', $trademarks)
            ->with('newProducts', $newProducts)
            ->with('topProducts', $topProducts)
            ->with('saleProducts', $saleProducts);
    }
    


public function boot()
{
    View::composer('*', function ($view) {
        $view->with('slides', Slide::all());
    });
}
public function show($id)
{
  
    $cartItems = collect(); // tạo collection rỗng mặc định
    $total = 0;
    $trademarks = Trademark::all();
    if (Auth::check()) {
        $user = Auth::user();
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });
    }

    $product = Product::with(['productType', 'trademark'])->findOrFail($id);
    $productTypes = ProductType::all();

    return view('user.home.chitietsp', compact('product', 'cartItems', 'total', 'productTypes', 'trademarks'));
}

public function sss()
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
    $trademarks = Trademark::all();

    return view('user.home.tranggioithieu', compact('cartItems', 'total', 'productTypes', 'slides', 'trademarks'));
}
public function search(Request $request)
{ $slides = Slide::all();
    $user = Auth::user();
    // Lấy danh sách sản phẩm trong giỏ hàng của user

if ($user) {
    $cartItems = Cart::with('product')
        ->where('user_id', $user->id)
        ->get();

    $total = $cartItems->sum(function ($item) {
        return $item->quantity * $item->unit_price;
    });
} else {
    $cartItems = collect(); // danh sách rỗng
    $total = 0;
}


    // Tính tổng tiền
    $total = $cartItems->sum(function ($item) {
        return $item->quantity * $item->unit_price;
    });
    $productTypes = ProductType::all();
    //
    $searchTerm = $request->input('s'); // Lấy từ khóa tìm kiếm từ người dùng

    // Lấy các sản phẩm theo từ khóa tìm kiếm trong tên hoặc mô tả
    $results = Product::where('name', 'like', '%' . $searchTerm . '%')
        ->orWhere('description', 'like', '%' . $searchTerm . '%')
        ->get();
    
    // Trả về view với kết quả tìm kiếm
    $trademarks = Trademark::all();
    return view('user.home.search_results', ['results' => $results], compact('cartItems', 'total', 'productTypes', 'slides', 'trademarks'))
        ->with('searchTerm', $searchTerm);
}


}


