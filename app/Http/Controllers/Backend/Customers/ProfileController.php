<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Countrie;
use App\Models\Currencie;
use App\Models\Customer_admin;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($id)
    {

        $customer = Customer::select('customers.*', 'customer_groups.groupid')
            ->leftJoin('customer_groups', 'customer_groups.customer_id', '=', 'customers.id')
            ->where('customers.id', $id)
            ->first();

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found.');
        }

        $customerAdmins = Customer_admin::select('customer_admins.*', 'users.name as userName')
            ->latest('customer_admins.id')
            ->leftJoin('users', 'users.id', '=', 'customer_admins.user_id')
            ->paginate(10);

        $currencies = Currencie::all();
        $languages = Language::all();
        $countries = Countrie::all();
        $users = User::all();
        return view('backend.customer.profile.index', [
            'customer' => $customer,
            'currencies' => $currencies,
            'languages' => $languages,
            'countries' => $countries,
            'users' => $users,
            'customerAdmins' => $customerAdmins,
        ]);
    }



    public function create_admin(Request $request, $id)
    {
        $create_by = Auth::user()->id;
        $customer = Customer::where('id', $id)->first();
        $customer_id = $customer->id;

        $customer_admin = new Customer_admin;
        $customer_admin->user_id = implode(',', $request->input('user_id'));
        $customer_admin->customer_id = $customer_id;
        $customer_admin->created_by = $create_by;
        $customer_admin->save();

        return redirect()->route('customers.profile', $customer_id)->with('success', 'Customer admin set successfully');
    }


    public function delete_admin(Request $request, $adminId, $customerId)
    {
        $customer = Customer::where('id', $customerId)->first();
        $customer_id = $customer->id;

        $customer_admin = Customer_admin::find($adminId);

        if (empty($customer_admin)) {
            return redirect()->route('customers.profile', $customer_id)->with('error', 'Admin not found');
        }

        $customer_admin->delete();

        return redirect()->route('customers.profile', $customer_id)->with('success', 'Admin removed successfully');
    }
}
