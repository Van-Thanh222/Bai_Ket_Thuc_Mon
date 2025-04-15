<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusChanged;
use App\Mail\OrderDeleted;
use App\Models\Trademark;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'product', 'discountCode')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function status($status)
    {
        $orders = Order::where('status', $status)->get();
        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $products = Product::all();
        $discountCodes = DiscountCode::all();
        return view('admin.order.create', compact('users', 'products', 'discountCodes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order_code' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'Original_price' => 'required|numeric',
            'Promotional_price' => 'required|numeric',
            'discount_code_id' => 'nullable|exists:discount_codes,id',
            'discount_price' => 'nullable|numeric',
            'Total_Price' => 'required|numeric',
            'status' => 'required|string',
            'note' => 'nullable|string',
        ]);
        
        Order::create($data);

        return redirect()->route('orders.index')->with('success', 'Tạo đơn hàng thành công');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();
        $products = Product::all();
        $discountCodes = DiscountCode::all();
        $trademarks = Trademark::all();
        return view('admin.order.edit', compact('order', 'users', 'products', 'discountCodes', 'trademarks'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $oldStatus = $order->status;
        $newStatus = (int)$request->status; // Đảm bảo luôn là số
        
        $order->update(['status' => $newStatus]);
        
        if ($oldStatus != $newStatus) {
            Mail::to($order->customer_email)->send(new OrderStatusChanged($order));
        }
        
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        Mail::to($order->customer_email)->send(new OrderDeleted($order));

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã bị xóa');
    }
    public function show($id)
{
    $order = Order::with(['user', 'product', 'discountCode'])->findOrFail($id);
    return view('admin.order.edit', compact('order'));
}
}
