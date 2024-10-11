<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FieldBelongsto;
use App\Models\CustomfieldType;
use App\Models\Customfield;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomFieldsController extends Controller
{
    public function index()
    {

        return view('backend.setups.customFieldes.index');
    }

    public function create()
    {
        $fieldname = FieldBelongsto::all();
        $typename = CustomfieldType::all();
        return view('backend.setups.customFieldes.create', compact('fieldname', 'typename'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fieldto' => 'required',
            'name' => 'required|string|max:255',
            'type' => 'required',
            'bs_column' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Customfield::create([

            'created_by' => Auth::user()->id,

            'fieldto' => $request->input('fieldto'),
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'default_value' => $request->input('default_value'),
            'options' => $request->input('options'),
            'field_order' => $request->input('field_order'),
            'bs_column' => $request->input('bs_column'),
            'slug' => Str::slug($request->input('name')),
            'active' => $request->input('active') ? 1 : 0,
            'only_admin' => $request->input('only_admin') ? 1 : 0,
            'required' => $request->input('required') ? 1 : 0,
            'show_on_table' => $request->input('show_on_table') ? 1 : 0,
            'show_on_pdf' => $request->input('show_on_pdf') ? 1 : 0,
            'show_on_ticket_form' => $request->input('show_on_ticket_form') ? 1 : 0,
            'show_on_client_portal' => $request->input('show_on_client_portal') ? 1 : 0,
            'disalow_client_to_edit' => $request->input('disalow_client_to_edit') ? 1 : 0,
            'display_inline' => $request->input('display_inline') ? 1 : 0,


        ]);
        return redirect()->route('setup.custom-fields.index')->with('success', 'Custom Fields Added successfully!');
    }
    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $isActive = $request->input('isActive');
        $customfield = Customfield::find($id);
        if (!$customfield) {
            return response()->json(['error' => 'Field not found'], 404);
        }
        $customfield->active = $isActive;
        $customfield->save();
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function edit($id)
    {
        $fieldname = FieldBelongsto::all();
        $typename = CustomfieldType::all();
        $editfield = Customfield::find($id);
        return view('backend.setups.customFieldes.edit', compact('editfield', 'fieldname', 'typename'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fieldto' => 'required',
            'name' => 'required|string|max:255',
            'type' => 'required',
            'bs_column' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $updatefield = Customfield::find($id);
        $updatefield->update([

            'created_by' => Auth::user()->id,

            'fieldto' => $request->input('fieldto'),
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'default_value' => $request->input('default_value'),
            'options' => $request->input('options'),
            'field_order' => $request->input('field_order'),
            'bs_column' => $request->input('bs_column'),
            'slug' => Str::slug($request->input('name')),
            'active' => $request->input('active') ? 1 : 0,
            'only_admin' => $request->input('only_admin') ? 1 : 0,
            'required' => $request->input('required') ? 1 : 0,
            'show_on_table' => $request->input('show_on_table') ? 1 : 0,
            'show_on_pdf' => $request->input('show_on_pdf') ? 1 : 0,
            'show_on_ticket_form' => $request->input('show_on_ticket_form') ? 1 : 0,
            'show_on_client_portal' => $request->input('show_on_client_portal') ? 1 : 0,
            'disalow_client_to_edit' => $request->input('disalow_client_to_edit') ? 1 : 0,
            'display_inline' => $request->input('display_inline') ? 1 : 0,


        ]);
        return redirect()->route('setup.custom-fields.index')->with('success', 'Custom Fields Updated successfully!');
    }
}
