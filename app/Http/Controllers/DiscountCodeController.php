<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use Illuminate\Http\Request;

class DiscountCodeController extends Controller
{
    public function index()
    {
        $codes = DiscountCode::all();
        return view('admin.discountcodes.index', compact('codes'));
    }

    public function create()
    {
        return view('admin.discountcodes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:discount_codes',
            'price' => 'required|numeric|min:0',
            'unit_price' => 'required|string',
            'description' => 'nullable|string',
        ]);

        DiscountCode::create($request->all());

        return redirect()->route('discount-codes.index')->with('success', 'Tạo mã giảm giá thành công!');
    }

    public function edit($id)
    {
        $code = DiscountCode::findOrFail($id);
        return view('discount_codes.edit', compact('code'));
    }

    public function update(Request $request, $id)
    {
        $code = DiscountCode::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:discount_codes,name,' . $id,
            'price' => 'required|numeric|min:0',
            'unit_price' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $code->update($request->all());

        return redirect()->route('discount-codes.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $code = DiscountCode::findOrFail($id);
        $code->delete();

        return redirect()->route('discount-codes.index')->with('success', 'Xoá mã giảm giá thành công!');
    }
}

