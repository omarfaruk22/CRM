<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class VaultController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.vault.index')->with(['customer' => $customer]);
    }
}
