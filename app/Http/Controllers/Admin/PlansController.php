<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller


{
    public function index()

    {
        $plans = Plan::all();
        return view('admin.plan.list', compact('plans'))->with('panel_title', 'لیست طرح ها');

    }

    public function create()
    {
        return view('admin.plan.create')->with('panel_title', 'ثبت طرح جدید');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'plan_title' => 'required',
            'plan_limit_download_count' => 'required',
            'plan_price' => 'required',
            'plan_days_count' => 'required',

        ]);

        $new_plan = Plan::create([
            'plan_title' => $request->input('plan_title'),
            'plan_limit_download_count' => $request->input('plan_limit_download_count'),
            'plan_price' => $request->input('plan_price'),
            'plan_days_count' => $request->input('plan_days_count')
        ]);
        if ($new_plan) {
            return redirect()->route('admin.plans.list')->with('success', 'طرح جدید با موفقیت ثبت شد');

        }

    }

    public function edit(Request $request, $plan_id)
    {
        $plan_id = intval($plan_id);
        $planItem = Plan::find($plan_id);
        return view('admin.plan.edit', compact('planItem'))->with('panel_title', 'ویرایش طرح');
    }

    public function update(Request $request, $plan_id)
    {
        $plan_id = intval($plan_id);
        $planItem = Plan::find($plan_id);
        $updated_plan = $planItem->update([
            'plan_title' => $request->input('plan_title'),
            'plan_limit_download_count' => $request->input('plan_limit_download_count'),
            'plan_price' => $request->input('plan_price'),
            'plan_days_count' => $request->input('plan_days_count')
        ]);
        if ($updated_plan) {
            return redirect()->route('admin.plans.list')->with('success', 'طرح با موفقیت بروزرسانی شد');
        }
    }

    public function delete(Request $request, $plan_id)
    {
        $plan_id = intval($plan_id);
        $planItem = Plan::find($plan_id);
        if ($planItem) {
            $planItem->delete();
            return redirect()->route('admin.plans.list')->with('success', 'طرح با موفقیت حذف شد');
        }
    }
}
