<?php

namespace App\Http\Controllers\Frontend;

use App\Models\File;
use App\Utility\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FilesController extends Controller
{
    public function details(Request $request, $file_id)
    {
        $fileItem = File::find($file_id);
        $currentUser = Auth::user()->id;
        return view('frontend.files.single', compact('fileItem', 'currentUser'))->with('panel_title', 'جزییات فایل');
    }

    public function download(Request $request, $file_id)
    {
        $user = Auth::user()->id;
        if (!\App\Utility\File::user_can_download($user)) {
            return redirect()->route('frontend.files.access');
        }
        $fileItem = File::find($file_id);
        if (!$fileItem) {
            return redirect()->back()->with('fileError', 'فایل درخواستی موجود نمی باشد');
        }
        $basePath = public_path('files\\');
        $filePath = $basePath . $fileItem->file_name;
        return response()->download($filePath);

    }

    public function access()
    {
        return view('frontend.files.access');
    }

    public function report(Request $request)
    {
        $file_id = $request->input('file_id');
        if ($file_id && intval($file_id) > 0) {
            $fileItem = File::find($file_id);
            $fileItem->increment('file_report_count');
            return [
                'success' => true,
                'message' => 'درخواست شما با موفقیت انجام شد'
            ];
        }
        return [
            'success' => false,
            'message' => 'درخواست شما ناموفق بود'
        ];
    }

}
