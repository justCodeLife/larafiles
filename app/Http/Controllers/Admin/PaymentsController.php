<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PaymentsController extends Controller

{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.list', compact('payments'))->with('panel_title', 'لیست پرداخت ها');
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
