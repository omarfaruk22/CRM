<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Language;
use App\Models\Lead;
use App\Models\LeadsSource;
use App\Models\LeadsStatus;
use App\Models\Staff;
use App\Models\WebToLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class WebToLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.setups.leads.webtolead.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = LeadsStatus::all();
        $sources = LeadsSource::all();
        $staffs = Staff::all();
        $languages = Language::all();
        $roles = Role::all();
        $fields = Field::all();

        return view('backend.setups.leads.webtolead.create', compact(
            'statuses',
            'sources',
            'staffs',
            'languages',
            'roles',
            'fields',
        ));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'language' => 'required',
            'lead_source' => 'required',
            'lead_status' => 'required',
            'responsible' => 'required',
            'submit_btn_name' => 'required',
            'submit_btn_bg_color' => 'required',
            'submit_btn_text_color' => 'required',
            'success_submit_msg' => 'required',
            'submit_redirect_url' => 'required',
            'success_submit_msg' => $request->input('submit_action') == 0 ? 'required_if:submit_action,0' : '',
            'submit_redirect_url' => $request->input('submit_action') == 1 ? 'required_if:submit_action,1' : '',
        ]);


        if ($request->notify_ids != null) {
            $notifyIds = implode(',', $request->notify_ids);
        } else {
            $notifyIds = null;
        }


        if ($request->notify_type == 'assigned') {
            $notifyIds = null;
        }


        WebToLead::create([
            'form_key' => $request->_token,
            'name' => $request->name,
            'language' => $request->language,
            'lead_name_prefix' => $request->lead_name_prefix,
            'lead_source' => $request->lead_source,
            'lead_status' => $request->lead_status,
            'responsible' => $request->responsible,
            'submit_btn_name' => $request->submit_btn_name,
            'submit_btn_bg_color' => $request->submit_btn_bg_color,
            'submit_btn_text_color' => $request->submit_btn_text_color,
            'success_submit_msg' => $request->success_submit_msg,
            'submit_redirect_url' => $request->name,
            'submit_action' => $request->submit_action,
            'mark_public' => $request->mark_public,
            'allow_duplicate' => $request->allow_duplicate,
            'track_duplicate_field' => $request->track_duplicate_field,
            'notify_lead_imported' => $request->notify_lead_imported,
            'track_duplicate_field_and' => $request->track_duplicate_field_and,
            'create_task_on_duplicate' => $request->create_task_on_duplicate,
            'notify_type' => $request->notify_type,
            'notify_ids' => $notifyIds,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('setup.leads.webtolead.index')->with('success', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $statuses = LeadsStatus::all();
        $sources = LeadsSource::all();
        $staffs = Staff::all();
        $languages = Language::all();
        $roles = Role::all();
        $fields = Field::all();

        $webToLeads = WebToLead::find($id);

        return view('backend.setups.leads.webtolead.edit', compact(
            'statuses',
            'sources',
            'staffs',
            'languages',
            'roles',
            'fields',
            'webToLeads',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $webToLeads = WebToLead::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'language' => 'required',
            'lead_source' => 'required',
            'lead_status' => 'required',
            'responsible' => 'required',
            'submit_btn_name' => 'required',
            'submit_btn_bg_color' => 'required',
            'submit_btn_text_color' => 'required',
            'success_submit_msg' => $request->input('submit_action') == 0 ? 'required_if:submit_action,0' : '',
            'submit_redirect_url' => $request->input('submit_action') == 1 ? 'required_if:submit_action,1' : '',
        ]);

        if ($request->notify_ids != null) {
            $notifyIds = implode(',', $request->notify_ids);
        } else {
            $notifyIds = null;
        }

        if ($request->notify_type == 'assigned') {
            $notifyIds = null;
        }

        $webToLeads->update([
            'form_key' => $request->_token,
            'name' => $request->name,
            'language' => $request->language,
            'lead_name_prefix' => $request->lead_name_prefix,
            'lead_source' => $request->lead_source,
            'lead_status' => $request->lead_status,
            'responsible' => $request->responsible,
            'submit_btn_name' => $request->submit_btn_name,
            'submit_btn_bg_color' => $request->submit_btn_bg_color,
            'submit_btn_text_color' => $request->submit_btn_text_color,
            'success_submit_msg' => $request->success_submit_msg,
            'submit_redirect_url' => $request->submit_redirect_url,
            'submit_action' => $request->submit_action,
            'mark_public' => $request->mark_public,
            'allow_duplicate' => $request->allow_duplicate,
            'track_duplicate_field' => $request->track_duplicate_field,
            'notify_lead_imported' => $request->notify_lead_imported,
            'track_duplicate_field_and' => $request->track_duplicate_field_and,
            'create_task_on_duplicate' => $request->create_task_on_duplicate,
            'notify_type' => $request->notify_type,
            'notify_ids' => $notifyIds,
            'updated_by' => Auth::user()->id,
        ]);

        return redirect()->route('setup.leads.webtolead.index')->with('success', 'Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
