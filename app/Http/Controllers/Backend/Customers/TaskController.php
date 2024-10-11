<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.task.index')->with(['customer' => $customer]);
    }

    public function create()
    {
        return view('backend.customer.task.create');
    }

    public function edit()
    {
        return view('backend.customer.task.edit');
    }
}
