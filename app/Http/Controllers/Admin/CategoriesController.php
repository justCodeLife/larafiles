<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'))->with('panel_title', 'لیست دسته بندی ها');
    }

    public function create()
    {
        return view('admin.category.create')->with(['panel_title' => 'ثبت دسته بندی جدید']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'category_name' => 'required',
        ], [
            'category_name.required' => 'لطفا نام دسته بندی را وارد کنید'
        ]);

        $new_category_data = [
            'category_name' => $request->input('category_name')];
        $new_category = Category::create($new_category_data);
        if ($new_category) {
            return redirect()->route('admin.categories.list')->with('success', 'دسته بندی با موفقیت ایجاد شد');
        }
    }

    public function edit(Request $request, $category_id)
    {
        $categoryItem = Category::find($category_id);
        return view('admin.category.edit', compact('categoryItem'))->with(['panel_title' => 'ویرایش دسته بندی']);
    }

    public function update(Request $request, $category_id)
    {
        $categoryItem = Category::find($category_id);
        $updateResult = $categoryItem->update([
            'category_name' => $request->input('category_name')
        ]);
        if ($updateResult) {
            return redirect()->route('admin.categories.list')->with('success', 'دسته بندی با موفقیت ویرایش شد');
        }
    }

    public function delete(Request $request, $category_id)
    {
        $removeResult = Category::destroy([$category_id]);
        return redirect()->route('admin.categories.list')->with('success', 'دسته بندی با موفقیت حذف شد');
    }
}
