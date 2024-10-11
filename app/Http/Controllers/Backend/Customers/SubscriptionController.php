<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.subscription.index')->with(['customer' => $customer]);
    }
    public function create()
    {
        return view('backend.customer.subscription.create');
    }
    public function edit()
    {
        return view('backend.customer.subscription.edit');
    }
}
