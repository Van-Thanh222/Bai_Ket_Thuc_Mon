<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Trademark;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Favourite;
use Illuminate\Support\Facades\View;
use App\Models\Slide;
use App\Models\User;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('productType')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $types = ProductType::all();
        $trademarks = Trademark::all();
        return view('admin.product.create', compact('types', 'trademarks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'id_type' => 'required|exists:product_types,id',
            'unit_price' => 'required|numeric',
            'price' => 'required|numeric',
            'promotion_price' => 'nullable|numeric',
            'new' => 'boolean',
            'top' => 'boolean',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'id_trademark' => 'required|exists:trademarks,id',


            // Các thông tin chi tiết ô tô
            'year' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'fuel_type' => 'nullable|string|max:50',
            'transmission' => 'nullable|string|max:50',
            'engine' => 'nullable|string|max:100',
            'seats' => 'nullable|integer',
            'color' => 'nullable|string|max:50',
            'origin' => 'nullable|string|max:100',
            'condition' => 'nullable|string|max:50',
            'warranty' => 'nullable|string|max:100',
            'vin' => 'nullable|string|max:100',
        ]);

        $data['new'] = $request->has('new');
        $data['top'] = $request->has('top');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['image'] = 'image/'.$filename;
        }

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit(Product $product)
    {
        $types = ProductType::all();
        $trademarks = Trademark::all(); // Thêm dòng này
        return view('admin.product.edit', compact('product', 'types','trademarks'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'id_type' => 'required|exists:product_types,id',
            'unit_price' => 'required|numeric',
            'price' => 'required|numeric',
            'promotion_price' => 'nullable|numeric',
            'new' => 'boolean',
            'top' => 'boolean',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'id_trademark' => 'required|exists:trademarks,id',

            // Các thông tin chi tiết ô tô
            'year' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'fuel_type' => 'nullable|string|max:50',
            'transmission' => 'nullable|string|max:50',
            'engine' => 'nullable|string|max:100',
            'seats' => 'nullable|integer',
            'color' => 'nullable|string|max:50',
            'origin' => 'nullable|string|max:100',
            'condition' => 'nullable|string|max:50',
            'warranty' => 'nullable|string|max:100',
            'vin' => 'nullable|string|max:100',
        ]);

        $data['new'] = $request->has('new');
        $data['top'] = $request->has('top');

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['image'] = 'image/'.$filename;
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy(Product $product)
    {
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Đã xóa sản phẩm');
    }
    //
    public function showByType($id)
{
    $productType = ProductType::findOrFail($id);
    $products = $productType->products()->get();

    $cartItems = [];
    $total = 0;
    $favourites = [];

    if (Auth::check()) {
        $user = Auth::user();
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        // Tính tổng tiền
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });

        // Sản phẩm yêu thích
        $favourites = Favourite::where('id_user', $user->id)->pluck('id_product')->toArray();
    }

    $productTypes = ProductType::all(); 
    $trademarks = Trademark::all();

    return view('user.home.by_type', compact(
        'products', 'productType', 'cartItems', 'total', 'favourites', 'productTypes', 'trademarks'
    ));
}
public function showByTrademark($id)
{
    $trademark = Trademark::findOrFail($id);
    $products = $trademark->products()->get();

    $cartItems = [];
    $total = 0;
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

    $productTypes = ProductType::all(); 
    $trademarks = Trademark::all();

    return view('user.home.by_type', compact(
        'products', 'trademark', 'cartItems', 'total', 'favourites', 'productTypes', 'trademarks'
    ));
}


}
