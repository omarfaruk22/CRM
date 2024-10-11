<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\TicketPriority;
use App\Models\TicketStatus;

class SettingsSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // general 

        $data['ticketpriorities'] = TicketPriority::all() ?? '';
        $data['ticketstatus'] = TicketStatus::all() ?? '';
        $data['services'] = Option::where('name', 'services')->first() ?? '';
        $data['staff_access_only_assigned_departments'] = Option::where('name', 'staff_access_only_assigned_departments')->first() ?? '';
        $data['staff_related_ticket_notification_to_assignee_only'] = Option::where('name', 'staff_related_ticket_notification_to_assignee_only')->first() ?? '';
        $data['receive_notification_on_new_ticket'] = Option::where('name', 'receive_notification_on_new_ticket')->first() ?? '';
        $data['receive_notification_on_new_ticket_replies'] = Option::where('name', 'receive_notification_on_new_ticket_replies')->first() ?? '';
        $data['staff_members_open_tickets_to_all_contacts'] = Option::where('name', 'staff_members_open_tickets_to_all_contacts')->first() ?? '';
        $data['automatically_assign_ticket_to_first_staff_responding'] = Option::where('name', 'automatically_assign_ticket_to_first_staff_responding')->first() ?? '';
        $data['access_tickets_to_none_staff_members'] = Option::where('name', 'access_tickets_to_none_staff_members')->first() ?? '';
        $data['allow_non_admin_staff_to_delete_ticket_attachments'] = Option::where('name', 'allow_non_admin_staff_to_delete_ticket_attachments')->first() ?? '';
        $data['allow_non_admin_members_to_delete_tickets_and_replies'] = Option::where('name', 'allow_non_admin_members_to_delete_tickets_and_replies')->first() ?? '';
        $data['allow_customer_to_change_ticket_status'] = Option::where('name', 'allow_customer_to_change_ticket_status')->first() ?? '';
        $data['only_show_contact_tickets'] = Option::where('name', 'only_show_contact_tickets')->first() ?? '';
        $data['ticket_replies_order'] = Option::where('name', 'ticket_replies_order')->first() ?? '';
        $data['enable_support_menu_badges'] = Option::where('name', 'enable_support_menu_badges')->first() ?? '';
        $data['default_ticket_reply_status'] = Option::where('name', 'default_ticket_reply_status')->first() ?? '';
        $data['maximum_allowed_ticket_attachments'] = Option::where('name', 'maximum_allowed_ticket_attachments')->first() ?? '';
        $data['ticket_attachments_file_extensions'] = Option::where('name', 'ticket_attachments_file_extensions')->first() ?? '';
        // end general 
        // email pipung 
        $data['email_piping_only_registered'] = Option::where('name', 'email_piping_only_registered')->first() ?? '';
        $data['email_piping_only_replies'] = Option::where('name', 'email_piping_only_replies')->first() ?? '';
        $data['ticket_import_reply_only'] = Option::where('name', 'ticket_import_reply_only')->first() ?? '';
        $data['email_piping_default_priority'] = Option::where('name', 'email_piping_default_priority')->first() ?? '';
        // end email piping 
        return view('backend.setups.settings.support', $data);
    }
    public function ticketform()
    {
        return view('backend.setups.settings.ticketform');
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

            return redirect()->route('settings.support.index')->with('success', 'Option has been updated successfully!');
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
