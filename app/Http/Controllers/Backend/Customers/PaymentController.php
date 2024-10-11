<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.payment.index')->with(['customer' => $customer]);
    }


    public function store(Request $request)
    {
        return $request;

    }

    public function show($id)
    {
        return view('backend.customer.payment.show');
    }
}
