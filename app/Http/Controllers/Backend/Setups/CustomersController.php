<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\Customers_group;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        return view('backend.setups.customers.groups.index');
    }

    public function store(Request $request)
    {
        Customers_group::create([
            'gname' => $request->gname,
        ]);

        return back()->with('success', 'Notes: Store Successfully');;
    }

    public function destroy(string $id)
    {
        Customers_group::find($id)->delete();
        return back()->with('success', 'Notes: Delete Successfully');
    }
}
