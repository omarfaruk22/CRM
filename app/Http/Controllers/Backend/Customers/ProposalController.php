<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.proposals.index')->with(['customer' => $customer]);
    }

    public function create()
    {
        return view('backend.customer.proposals.create');
    }

    public function edit()
    {
        return view('backend.customer.proposals.edit');
    }

    public function show()
    {
        return view('backend.customer.proposals.show');
    }
}
