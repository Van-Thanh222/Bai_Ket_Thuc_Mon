<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slide.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imageName);

        Slide::create([
            'name'  => $request->name,
            'image' => $imageName,
        ]);

        return redirect()->route('slides.index')->with('success', 'Thêm slide thành công!');
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slide.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slide->name = $request->name;

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            $oldPath = public_path('image/' . $slide->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $slide->image = $imageName;
        }

        $slide->save();

        return redirect()->route('slides.index')->with('success', 'Cập nhật slide thành công!');
    }

    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $imagePath = public_path('image/' . $slide->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $slide->delete();

        return redirect()->route('slides.index')->with('success', 'Xóa slide thành công!');
    }
}
