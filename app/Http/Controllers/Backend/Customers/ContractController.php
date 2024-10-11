<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.contract.index')->with(['customer' => $customer]);
    }

    public function create()
    {
        return view('backend.customer.contract.create');
    }

    public function show()
    {
        return view('backend.customer.contract.show');
    }

    public function edit()
    {
        return view('backend.customer.contract.edit');
    }

    public function new_task()
    {
        return view('backend.customer.contract.new-task');
    }

    public function send_to_email()
    {
        return view('backend.customer.contract.send-to-email');
    }
}
