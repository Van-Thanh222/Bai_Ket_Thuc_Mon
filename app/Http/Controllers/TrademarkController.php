<?php

namespace App\Http\Controllers;


use App\Models\Trademark;
use App\Models\Product;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    public function index()
    {
        $trademarks = Trademark::all();
        return view('admin.trademark.index', compact('trademarks'));
    }

    public function create()
    {
        return view('admin.trademark.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image',
            'describe' => 'nullable|string',
        ]);

        $data = $request->all();

        // Xử lý ảnh nếu có
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['avatar'] = 'image/' . $filename;
        }

        Trademark::create($data);

        return redirect()->route('trademark.index')->with('success', 'Thêm thương hiệu thành công!');
    }

    public function edit($id)
    {
        $trademark = Trademark::findOrFail($id);
        return view('admin.trademark.edit', compact('trademark'));
    }

    public function update(Request $request, $id)
    {
        $trademark = Trademark::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image',
            'describe' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['avatar'] = 'image/' . $filename;
        }

        $trademark->update($data);

        return redirect()->route('trademark.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
{
    $trademark = Trademark::findOrFail($id);

    // Kiểm tra xem có sản phẩm nào đang dùng trademark này không
    $productCount = Product::where('id_trademark', $id)->count();

    if ($productCount > 0) {
        return redirect()->route('trademark.index')
            ->with('error', 'Không thể xóa! Có ' . $productCount . ' sản phẩm đang sử dụng thương hiệu này.');
    }

    // Nếu không có, xóa ảnh (nếu có)
    if ($trademark->avatar && file_exists(public_path($trademark->avatar))) {
        unlink(public_path($trademark->avatar));
    }

    $trademark->delete();

    return redirect()->route('trademark.index')
        ->with('success', 'Đã xóa thương hiệu thành công.');
}
}

