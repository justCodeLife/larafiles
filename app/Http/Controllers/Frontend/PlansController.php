<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('frontend.plans.index', compact('plans'));
    }
}
