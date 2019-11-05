<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\File;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use PhpParser\Node\Stmt\DeclareDeclare;

class PackagesController extends Controller

{
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.list', compact('packages'))->with('panel_title', 'لیست پکیج ها');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.package.create', compact('categories'))->with(['panel_title' => 'ثبت پکیج جدید']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'package_title' => 'required',
            'package_price' => 'required'
        ], [
            'package_title.required' => 'لطفا نام پکیج را وارد کنید',
            'package_price.required' => 'لطفا قیمت پکیج را وارد کنید'

        ]);

        $new_package_data = [
            'package_title' => $request->input('package_title'),
            'package_price' => $request->input('package_price')
        ];
        $new_package = Package::create($new_package_data);
        if ($new_package) {
            if ($request->has('categories')) {
                $new_package->categories()->sync($request->input('categories'));
            }
            return redirect()->route('admin.packages.list')->with('success', 'پکیج با موفقیت ایجاد شد');
        }
    }

    public
    function edit(Request $request, $package_id)
    {
        $packageItem = Package::find($package_id);
        $categories = Category::all();
        $packageCategories = $packageItem->categories()->get()->pluck('category_id')->toArray();
        return view('admin.package.edit', compact('packageItem', 'categories', 'packageCategories'))->with(['panel_title' => 'ویرایش پکیج']);
    }

    public
    function update(Request $request, $package_id)
    {
        $packageItem = Package::find($package_id);
        if ($packageItem) {
            $packageItem->update([
                'package_title' => $request->input('package_title'),
                'package_price' => $request->input('package_price')
            ]);
            if ($request->has('categories')) {
                $packageItem->categories()->sync($request->input('categories'));
            }
            return redirect()->route('admin.packages.list')->with('success', 'پکیج با موفقیت ویرایش شد');
        }
    }

    public
    function delete()
    {

    }

    public
    function syncFiles(Request $request, $package_id)
    {
        $files = File::all();
        $packageItem = Package::find($package_id);
        $package_files = $packageItem->files()->get()->pluck('file_id')->toArray();
        return view('admin.package.files', compact('files', 'package_files'))->with('panel_title', 'انتخاب فایل های پکیج');
    }

    public
    function updateSyncFiles(Request $request, $package_id)
    {
        $packageItem = Package::find($package_id);
        $files = $request->input('files');
        if ($packageItem && is_array($files)) {
            //$packageItem->files()->attach($files);
            $packageItem->files()->sync($files);
            return redirect()->route('admin.packages.list')->with('success', 'اطلاعات با موفقیت ذخیره شد');
        }
    }
}
