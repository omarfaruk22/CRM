<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class SettingsCornJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['invoice_auto_operations_hour'] = Option::where('name', 'invoice_auto_operations_hour')->first() ?? '';
        $data['automatically_send_invoice_overdue_reminder_after'] = Option::where('name', 'automatically_send_invoice_overdue_reminder_after')->first() ?? '';
        $data['automatically_resend_invoice_overdue_reminder_after'] = Option::where('name', 'automatically_resend_invoice_overdue_reminder_after')->first() ?? '';
        $data['invoice_due_notice_before'] = Option::where('name', 'invoice_due_notice_before')->first() ?? '';
        $data['invoice_due_notice_resend_after'] = Option::where('name', 'invoice_due_notice_resend_after')->first() ?? '';
        $data['new_recurring_invoice_action'] = Option::where('name', 'new_recurring_invoice_action')->first() ?? '';
        $data['create_invoice_from_recurring_only_on_paid_invoices'] = Option::where('name', 'create_invoice_from_recurring_only_on_paid_invoices')->first() ?? '';

        $data['estimates_auto_operations_hour'] = Option::where('name', 'estimates_auto_operations_hour')->first() ?? '';
        $data['send_estimate_expiry_reminder_before'] = Option::where('name', 'send_estimate_expiry_reminder_before')->first() ?? '';

        $data['proposals_auto_operations_hour'] = Option::where('name', 'proposals_auto_operations_hour')->first() ?? '';
        $data['send_proposal_expiry_reminder_before'] = Option::where('name', 'send_proposal_expiry_reminder_before')->first() ?? '';

        $data['expenses_auto_operations_hour'] = Option::where('name', 'expenses_auto_operations_hour')->first() ?? '';

        $data['contracts_auto_operations_hour'] = Option::where('name', 'contracts_auto_operations_hour')->first() ?? '';
        $data['contract_expiration_before'] = Option::where('name', 'contract_expiration_before')->first() ?? '';
        $data['contract_sign_reminder_every_days'] = Option::where('name', 'contract_sign_reminder_every_days')->first() ?? '';

        $data['tasks_reminder_notification_hour'] = Option::where('name', 'tasks_reminder_notification_hour')->first() ?? '';
        $data['tasks_reminder_notification_before'] = Option::where('name', 'tasks_reminder_notification_before')->first() ?? '';
        $data['automatically_stop_task_timer_after_hours'] = Option::where('name', 'automatically_stop_task_timer_after_hours')->first() ?? '';
        $data['reminder_for_completed_but_not_billed_tasks'] = Option::where('name', 'reminder_for_completed_but_not_billed_tasks')->first() ?? '';

        $data['autoclose_tickets_after'] = Option::where('name', 'autoclose_tickets_after')->first() ?? '';

        return view('backend.setups.settings.cornjob', $data);
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

            return redirect()->route('settings.cron_jobs.index')->with('success', 'Option has been updated successfully!');
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
