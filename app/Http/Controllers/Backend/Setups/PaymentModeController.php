<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentModeController extends Controller
{
    public function index()
    {
        return view('backend.setups.finance.payment-modes');
    }
}
