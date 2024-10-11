<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesPaymentController extends Controller
{
    public function index()
    {
        return view('backend.sales.payment.index');
    }
}
