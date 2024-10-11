<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Countrie;
use App\Models\Currencie;
use App\Models\Customer;
use App\Models\ItemGroup;
use App\Models\Lead;
use App\Models\LeadsStatus;
use App\Models\MainLead;
use App\Models\Milestone;
use App\Models\Priority;
use App\Models\Project;
use App\Models\Proposal_item;
use App\Models\ProposalItem;
use App\Models\Relation;
use App\Models\SalesProposal;
use App\Models\SaleStatus;
use App\Models\Staff;
use App\Models\Tag;
use App\Models\Tax;
use App\Models\TbItem;
use Illuminate\Http\Request;

class SalesProposalController extends Controller
{
    public function index()
    {
        return view('backend.sales.Proposal.index');
    }

    public function switch_to_profile()
    {
        //
    }

    public function fetchItemData(Request $request)
    {
        $itemId = $request->input('itemId');
        $item = TbItem::find($itemId);
        return response()->json($item);
    }

    public function fetchLeadData(Request $request)
    {
        $leadId = $request->input('leadId');
        $lead = MainLead::find($leadId);
        return response()->json($lead);
    }

    // public function fetchCustomerData(Request $request)
    // {
    //     $customerID = $request->input('customerID');
    //     $customer = Customer::find($customerID);

    //     if (!$customer) {
    //         return response()->json(['error' => 'Customer not found'], 404);
    //     }

    //     $primaryContact = Contact::where('customer_id', $customerID)
    //         ->where('is_primary', 1)
    //         ->first();

    //     $customerProject = Project::where('customer_id', $customerID)->get();

    //     if ($primaryContact) {
    //         $customer->proposalprimaryemailfrom = $primaryContact->email;

    //         $customer->contactTo = $primaryContact->firstname . ' ' . $primaryContact->lastname;

    //         $customer->id = $primaryContact->id;
    //     } else {

    //         $customer->proposalprimaryemail = null;
    //         $customer->contactTo = null;
    //     }

    //     return response()->json($customer);
    // }

    public function fetchCustomerData(Request $request)
    {
        $customerID = $request->input('customerID');
        $customer = Customer::find($customerID);

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        $primaryContact = Contact::where('customer_id', $customerID)
            ->where('is_primary', 1)
            ->first();

        $customerProjects = Project::where('customer_id', $customerID)->get();

        if ($primaryContact) {
            $customer->proposalprimaryemailfrom = $primaryContact->email;

            $customer->contactTo = $primaryContact->firstname . ' ' . $primaryContact->lastname;
            $customer->id = $primaryContact->customer_id;
        } else {

            $customer->proposalprimaryemail = null;
            $customer->contactTo = null;
        }


        return response()->json(['customer' => $customer, 'customer_projects' => $customerProjects]);
    }


    // public function fetchContactData(Request $request)
    // {
    //     $contactID = $request->input('contactID');
    //     $contact = Contact::find($contactID);
    //     return response()->json($contact);
    // }





    public function itemcreate(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:65535',
            'longDescription' => 'nullable|string|max:16777215',
            'rate' => 'required|numeric',
            'rateCheckbox' => 'required|string|in:USD,EUR',
            'group_id' => 'nullable|integer',
        ]);


        if ($validatedData) {
            $item = TbItem::create([
                'description' => $validatedData['description'],
                'long_description' => $validatedData['longDescription'],
                'rate' => $validatedData['rate'],
                'currency' => $validatedData['rateCheckbox'],
                'tax' => $request->input('tax1'),
                'tax2' => $request->input('tax2'),
                'unit' => $request->input('unit'),
                'group_id' => $request->filled('group_id') ? $request->input('group_id') : 0,
            ]);

            return redirect()->route('sales.proposals.create')->with('success', '"' . $item->description . '" Item created successfully.');
        } else {
            return redirect()->route('sales.proposals.create')->with('error', 'Validation failed, please insert data correctly.');
        }
    }


    public function create()
    {
        $data['customers'] = Customer::all();
        $data['leads'] = MainLead::all();
        // $data['contacts'] = Contact::all();
        $data['taxes']  =  Tax::all();
        $data['priorities'] = Priority::all();
        $data['tags'] = Tag::all();
        $data['staffs'] = Staff::all();
        $data['statuses'] = SaleStatus::all();
        $data['countries'] = Countrie::all();
        $data['currencies'] = Currencie::all();
        $data['relations'] = Relation::all();
        $data['items'] = TbItem::all();
        $data['groups']  = ItemGroup::all();
        return view('backend.sales.Proposal.create', $data);
    }


    public function details()
    {
        return view('backend.sales.Proposal.details');
    }


    public function store(Request $request)
    {
        return $request;
        SalesProposal::create([
            'subject' => $request->subject,
            'releted' => $request->releted,
            'subreleted' => $request->subreleted,
            'status' => $request->status,
            'assigned' => $request->assigned,
            'to' => $request->to,
            'address' => $request->address,
            'estimateDate' => $request->estimateDate,
            'opentill' => $request->opentill,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'email' => $request->email,
            'phone' => $request->phone,
            'itemid' => $request->itemid,
            'total' => $request->total,
            'default_currency' => $request->default_currency,
        ]);

        return back();
    }
    public function show($id)
    {
        return view('backend.sales.Proposal.show');
    }
}
