<?php

namespace App\Http\Controllers\Backend\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\SubscriptionMod;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $subscriptions = SubscriptionMod::all();

        if (!$customers) {
            return redirect()->route('customers.index')->with('error', 'Customer not found.');
        }

        return view('backend.subscriptions.index', [
            'customers' => $customers,
            'subscriptions' => $subscriptions,
        ]);
    }

    public function create()
    {
        $customers = Customer::all();
        return view('backend.subscriptions.create', [
            'customers' => $customers,
        ]);

    }


public function store(Request $request)
{
    $subscription = new SubscriptionMod();


    $subscription->quantity = $request->quantity;
    $subscription->date = $request->date;
    $subscription->name = $request->subname;
    $subscription->description_in_item = $request->description_in_item;
    $subscription->clientid = $request->clientid;
    $subscription->currency = $request->currency;
    $subscription->stripe_tax_id = $request->stripe_tax_id;
    $subscription->stripe_tax_id_2 = $request->stripe_tax_id_2;
    $subscription->description = $request->description;
    $subscription->save();

    return redirect()->route('subscription.index')->with('success', 'Subscription created successfully.');
}




}
