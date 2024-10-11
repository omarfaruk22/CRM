<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.invoices.index')->with(['customer' => $customer]);
    }

    public function create()
    {
        return view('backend.customer.invoices.create');
    }

    public function show()
    {
        return view('backend.customer.invoices.show');
    }

    public function edit()
    {
        return view('backend.customer.invoices.edit');
    }
}
