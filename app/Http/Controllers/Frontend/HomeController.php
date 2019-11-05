<?php

namespace App\Http\Controllers\Frontend;

use App\Models\File;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $files=File::all();
        $packages=Package::all();
        return view('frontend.home.index',compact('files','packages'));
    }
}
