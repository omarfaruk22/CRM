<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\CalenderFirstday;
use App\Models\CalenderView;

class SettingsCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['firstdays'] = CalenderFirstday::all() ?? '';
        $data['defaultviews'] = CalenderView::all() ?? '';

        $data['calendar_events_limit'] = Option::where('name', 'calendar_events_limit')->first() ?? '';
        $data['default_view_calendar'] = Option::where('name', 'default_view_calendar')->first() ?? '';
        $data['calendar_first_day'] = Option::where('name', 'calendar_first_day')->first() ?? '';
        $data['hide_notified_reminders_from_calendar'] = Option::where('name', 'hide_notified_reminders_from_calendar')->first() ?? '';
        $data['show_ticket_reminders_on_calendar'] = Option::where('name', 'show_ticket_reminders_on_calendar')->first() ?? '';
        $data['show_lead_reminders_on_calendar'] = Option::where('name', 'show_lead_reminders_on_calendar')->first() ?? '';
        $data['show_invoice_reminders_on_calendar'] = Option::where('name', 'show_invoice_reminders_on_calendar')->first() ?? '';
        $data['show_customer_reminders_on_calendar'] = Option::where('name', 'show_customer_reminders_on_calendar')->first() ?? '';
        $data['show_estimate_reminders_on_calendar'] = Option::where('name', 'show_estimate_reminders_on_calendar')->first() ?? '';
        $data['show_proposal_reminders_on_calendar'] = Option::where('name', 'show_proposal_reminders_on_calendar')->first() ?? '';
        $data['show_expense_reminders_on_calendar'] = Option::where('name', 'show_expense_reminders_on_calendar')->first() ?? '';
        $data['show_task_reminders_on_calendar'] = Option::where('name', 'show_task_reminders_on_calendar')->first() ?? '';
        $data['show_credit_note_reminders_on_calendar'] = Option::where('name', 'show_credit_note_reminders_on_calendar')->first() ?? '';
        $data['show_invoices_on_calendar'] = Option::where('name', 'show_invoices_on_calendar')->first() ?? '';
        $data['show_estimates_on_calendar'] = Option::where('name', 'show_estimates_on_calendar')->first() ?? '';
        $data['show_proposals_on_calendar'] = Option::where('name', 'show_proposals_on_calendar')->first() ?? '';
        $data['show_contracts_on_calendar'] = Option::where('name', 'show_contracts_on_calendar')->first() ?? '';
        $data['show_tasks_on_calendar'] = Option::where('name', 'show_tasks_on_calendar')->first() ?? '';
        $data['calendar_only_assigned_tasks'] = Option::where('name', 'calendar_only_assigned_tasks')->first() ?? '';
        $data['show_projects_on_calendar'] = Option::where('name', 'show_projects_on_calendar')->first() ?? '';
        // end general 
        // styling 
        $data['calendar_invoice_color'] = Option::where('name', 'calendar_invoice_color')->first() ?? '';
        $data['calendar_estimate_color'] = Option::where('name', 'calendar_estimate_color')->first() ?? '';
        $data['calendar_proposal_color'] = Option::where('name', 'calendar_proposal_color')->first() ?? '';
        $data['calendar_reminder_color'] = Option::where('name', 'calendar_reminder_color')->first() ?? '';
        $data['calendar_contract_color'] = Option::where('name', 'calendar_contract_color')->first() ?? '';
        $data['calendar_project_color'] = Option::where('name', 'calendar_project_color')->first() ?? '';


        // end 
        return view('backend.setups.settings.calender', $data);
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

            return redirect()->route('settings.calender.index')->with('success', 'Option has been updated successfully!');
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
