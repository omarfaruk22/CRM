<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CreditnoteController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.creditnote.index')->with(['customer' => $customer]);
    }
    public function create()
    {
        return view('backend.customer.creditnote.create');
    }
    public function edit()
    {
        return view('backend.customer.creditnote.edit');
    }
    public function show()
    {
        return view('backend.customer.creditnote.show');
    }
}
