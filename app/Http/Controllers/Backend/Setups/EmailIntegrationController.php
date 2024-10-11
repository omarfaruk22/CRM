<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\LeadsEmailIntegrations;
use App\Models\LeadsSource;
use App\Models\LeadsStatus;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class EmailIntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = LeadsStatus::all();
        $sources = LeadsSource::all();
        $responsibles = Staff::all();
        $emailIntegrations = LeadsEmailIntegrations::first();
        $staffs = Staff::all();
        $roles = Role::all();

        return view(
            'backend.setups.leads.emailIntegration.index',
            compact(
                'statuses',
                'sources',
                'responsibles',
                'emailIntegrations',
                'staffs',
                'roles',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $emailIntegration = LeadsEmailIntegrations::find($id);

        $request->validate([
            'imap_server' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'check_every' => 'required',
            'folder' => 'required',
            'lead_status' => 'required',
            'lead_source' => 'required',
            'responsible' => 'required',
        ]);


        if ($request->notify_ids != null) {
            $notifyIds = implode(',', $request->notify_ids);
        } else {
            $notifyIds = null;
        }


        if ($request->notify_type == 'assigned') {
            $notifyIds = null;
        }


        $emailIntegration->update([
            'active' => $request->active,
            'email' => $request->email,
            'imap_server' => $request->imap_server,
            'password' => $request->password,
            'check_every' => $request->check_every,
            'responsible' => $request->responsible,
            'lead_source' => $request->lead_source,
            'lead_status' => $request->lead_status,
            'encryption' => $request->encryption,
            'folder' => $request->folder,
            'last_run' => now(),
            'notify_lead_imported' => $request->notify_lead_imported,
            'notify_lead_contact_more_times' => $request->notify_lead_contact_more_times,
            'notify_type' => $request->notify_type,
            'notify_ids' => $notifyIds,
            'mark_public' => $request->mark_public,
            'only_loop_on_unseen_emails' => $request->only_loop_on_unseen_emails,
            'delete_after_import' => $request->delete_after_import,
            'create_task_if_customer' => $request->create_task_if_customer,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);

        return redirect()->route('setup.leads.emailIntegration.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
