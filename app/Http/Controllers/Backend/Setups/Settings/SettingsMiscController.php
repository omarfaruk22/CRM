<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Models\Option;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;


class SettingsMiscController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['staffs'] = Role::all() ?? '';
        // dd($data['staffs']);
        $data['view_contract_only_logged_in'] = Option::where('name', 'view_contract_only_logged_in')->first() ?? '';
        $data['dropbox_app_key'] = Option::where('name', 'dropbox_app_key')->first() ?? '';
        $data['media_max_file_size_upload'] = Option::where('name', 'media_max_file_size_upload')->first() ?? '';
        $data['newsfeed_maximum_files_upload'] = Option::where('name', 'newsfeed_maximum_files_upload')->first() ?? '';
        $data['limit_top_search_bar_results_to'] = Option::where('name', 'limit_top_search_bar_results_to')->first() ?? '';
        $data['default_staff_role'] = Option::where('name', 'default_staff_role')->first() ?? '';
        $data['delete_activity_log_older_then'] = Option::where('name', 'delete_activity_log_older_then')->first() ?? '';
        $data['show_setup_menu_item_only_on_hover'] = Option::where('name', 'show_setup_menu_item_only_on_hover')->first() ?? '';
        $data['show_help_on_setup_menu'] = Option::where('name', 'show_help_on_setup_menu')->first() ?? '';
        $data['use_minified_files'] = Option::where('name', 'use_minified_files')->first() ?? '';

        $data['save_last_order_for_tables'] = Option::where('name', 'save_last_order_for_tables')->first() ?? '';
        $data['show_table_export_button'] = Option::where('name', 'show_table_export_button')->first() ?? '';
        $data['tables_pagination_limit'] = Option::where('name', 'tables_pagination_limit')->first() ?? '';

        $data['staff_members_create_inline_lead_status'] = Option::where('name', 'staff_members_create_inline_lead_status')->first() ?? '';
        $data['staff_members_create_inline_lead_source'] = Option::where('name', 'staff_members_create_inline_lead_source')->first() ?? '';
        $data['staff_members_create_inline_customer_groups'] = Option::where('name', 'staff_members_create_inline_customer_groups')->first() ?? '';
        $data['staff_members_create_inline_ticket_services'] = Option::where('name', 'staff_members_create_inline_ticket_services')->first() ?? '';
        $data['staff_members_save_tickets_predefined_replies'] = Option::where('name', 'staff_members_save_tickets_predefined_replies')->first() ?? '';
        $data['staff_members_create_inline_contract_types'] = Option::where('name', 'staff_members_create_inline_contract_types')->first() ?? '';
        $data['staff_members_create_inline_expense_categories'] = Option::where('name', 'staff_members_create_inline_expense_categories')->first() ?? '';
        return view('backend.setups.settings.misc', $data);
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

            return redirect()->route('settings.misc.index')->with('success', 'Option has been updated successfully!');
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
