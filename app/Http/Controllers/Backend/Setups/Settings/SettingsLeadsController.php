<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\LeadsSource;
use App\Models\LeadsStatus;

class SettingsLeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['leadsstatuses'] = LeadsSource::all()  ?? '';
        $data['leadssources'] = LeadsStatus::all() ?? '';
        $data['leads_kanban_limit'] = Option::where('name', 'leads_kanban_limit')->first() ?? '';
        $data['leads_default_status'] = Option::where('name', 'leads_default_status')->first() ?? '';
        $data['leads_default_source'] = Option::where('name', 'leads_default_source')->first() ?? '';
        $data['lead_unique_validation'] = Option::where('name', 'lead_unique_validation')->first() ?? '';
        $data['auto_assign_customer_admin_after_lead_convert'] = Option::where('name', 'auto_assign_customer_admin_after_lead_convert')->first() ?? '';
        $data['allow_non_admin_members_to_import_leads'] = Option::where('name', 'allow_non_admin_members_to_import_leads')->first() ?? '';
        $data['default_leads_kanban_sort'] = Option::where('name', 'default_leads_kanban_sort')->first() ?? '';
        $data['default_leads_kanban_sort_type'] = Option::where('name', 'default_leads_kanban_sort_type')->first() ?? '';
        $data['lead_lock_after_convert_to_customer'] = Option::where('name', 'lead_lock_after_convert_to_customer')->first() ?? '';
        $data['lead_modal_class'] = Option::where('name', 'lead_modal_class')->first() ?? '';
        return view('backend.setups.settings.leads', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        try {
            $optionDatas = $request->except('_token', '_method');

            foreach ($optionDatas as $key => $optionData) {
                if (is_array($optionData)) {
                    $optionData = json_encode($optionData);
                }

                Option::where('name', $key)->update([
                    'value' => $optionData
                ]);
            }

            return redirect()->route('settings.lead.index')->with('success', 'Option has been updated successfully!');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
