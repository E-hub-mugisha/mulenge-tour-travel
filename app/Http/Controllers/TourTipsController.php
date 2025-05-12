<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TourTips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourTipsController extends Controller
{
    public function indexCategory()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->all();

        Category::create($data);

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->all();

        $category = Category::findOrFail($id);

        $category->update($data);

        return redirect()->back()->with('success', 'category updated successfully.');
    }

    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'ca$category deleted successfully.');
    }
    public function indexTips()
    {
        $tips = TourTips::all();
        $categories = Category::all();
        return view('admin.categories.tips', compact('tips', 'categories'));
    }

    public function storeTips(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'read_time' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($images = $request->file('images')) {
            $destinationPath = 'image/tips/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $data['images'] = "$profileImage";
        }

        TourTips::create([
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->title,
            'content' => $request->content,
            'read_time' => $request->read_time,
            'images' => $profileImage,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Tips added successfully.');
    }

    public function updateTips(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'read_time' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($images = $request->file('images')) {
            $destinationPath = 'image/tips/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $data['images'] = "$profileImage";
        }

        TourTips::create([
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->title,
            'content' => $request->content,
            'read_time' => $request->read_time,
            'images' => $data,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Tips updated successfully.');
    }

    public function destroyTips($id)
    {
        $tips = TourTips::findOrFail($id);
        $tips->delete();

        return redirect()->back()->with('success', 'Tips deleted successfully.');
    }
}
