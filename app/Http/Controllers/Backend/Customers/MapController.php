<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.map.index')->with(['customer' => $customer]);
    }

    public function locationstore(Request $request, $id)
    {

        // dd($request);
        $customer = Customer::find($id);


        // Update latitude and longitude
        $customer->latitude = $request->latitude;
        $customer->longitude = $request->longitude;

        $customer->save();

        return back()->with('success', 'Location updated successfully');
    }
}
