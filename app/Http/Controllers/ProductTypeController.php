<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    public function index()
    {
        $types = ProductType::all();
        return view('admin.type_product.index', compact('types'));
    }

    public function create()
    {
        return view('admin.type_product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['image'] = 'image/' . $filename;
        }
        

        ProductType::create($data);
        return redirect()->route('product-types.index')->with('success', 'Thêm thành công!');
    }

    public function edit(ProductType $productType)
    {
        return view('admin.type_product.edit', compact('productType'));
    }

    public function update(Request $request, ProductType $productType)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['image'] = 'image/' . $filename;
        }
        

        $productType->update($data);
        return redirect()->route('product-types.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(ProductType $productType)
    {
        $productType->delete();
        return redirect()->route('product-types.index')->with('success', 'Đã xóa!');
    }
}

