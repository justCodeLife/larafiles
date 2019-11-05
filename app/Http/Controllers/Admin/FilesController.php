<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('admin.file.list', compact('files'))->with('panel_title', 'لیست فایل ها');
    }

    public function create()
    {
        return view('admin.file.create')->with('panel_title', 'ثبت فایل جدید');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'file_title' => 'required',
            'fileItem' => 'required'
        ], [
            'file_title.required' => 'لطفا نام فایل را وارد کنید',
            'fileItem.required' => 'لطفا فایل را وارد کنید'

        ]);

        $new_file_data = [
            'file_title' => $request->input('file_title'),
            'file_description' => $request->input('file_title'),
            'file_type' => $request->file('fileItem')->getMimeType(),
            'file_size' => $request->file('fileItem')->getSize(),

        ];
        $new_file_name = str_random(45) . '.' . $request->file('fileItem')->getClientOriginalExtension();
        $result = $request->file('fileItem')->move(public_path('files'), $new_file_name);
        if ($result instanceof \Symfony\Component\HttpFoundation\File\File) {
            $new_file_data['file_name'] = $new_file_name;
            File::create($new_file_data);
        }
    }

    public function delete()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
