<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use App\Models\TbItem;
use App\Models\ItemGroup;
use App\Models\Tax;

use Illuminate\Http\Request;

class SalesItemsController extends Controller
{
    public function index()
    {

        // $data['customers'] = Customer::all();
        // $data['leads'] = MainLead::all();
        // $data['contacts'] = Contact::all();
        $data['taxes']  =  Tax::all();
        // $data['priorities'] = Priority::all();
        // $data['tags'] = Tag::all();
        // $data['staffs'] = Staff::all();
        // $data['statuses'] = SaleStatus::all();
        // $data['countries'] = Countrie::all();
        // $data['currencies'] = Currencie::all();
        // $data['relations'] = Relation::all();
        $data['items'] = TbItem::all();
        $data['groups']  = ItemGroup::all();
        return view('backend.sales.items.index', $data);
    }


    public function importsalesitem()
    {
        return view('backend.sales.items.importsalesitem');
    }


    public function itemcreate(Request $request)
    {

        // return $request;
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

            // return $item;

            return redirect()->route('sales.items')->with('success', '"' . $item->description . '" Item created successfully.');
        } else {
            return redirect()->route('sales.items')->with('error', 'Validation failed, please insert data correctly.');
        }
    }
}
