<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class SettingsSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sms_clickatell_api_key'] = Option::where('name', 'sms_clickatell_api_key')->first() ?? '';
        $data['sms_clickatell_active'] = Option::where('name', 'sms_clickatell_active')->first() ?? '';

        $data['sms_msg91_sender_id'] = Option::where('name', 'sms_msg91_sender_id')->first() ?? '';
        $data['sms_msg91_api_type'] = Option::where('name', 'sms_msg91_api_type')->first() ?? '';
        $data['sms_msg91_auth_key'] = Option::where('name', 'sms_msg91_auth_key')->first() ?? '';
        $data['sms_msg91_active'] = Option::where('name', 'sms_msg91_active')->first() ?? '';

        $data['sms_twilio_account_sid'] = Option::where('name', 'sms_twilio_account_sid')->first() ?? '';
        $data['sms_twilio_auth_token'] = Option::where('name', 'sms_twilio_auth_token')->first() ?? '';
        $data['sms_twilio_phone_number'] = Option::where('name', 'sms_twilio_phone_number')->first() ?? '';
        $data['sms_twilio_sender_id'] = Option::where('name', 'sms_twilio_sender_id')->first() ?? '';
        $data['sms_twilio_active'] = Option::where('name', 'sms_twilio_active')->first() ?? '';

        $data['bitly_access_token'] = Option::where('name', 'bitly_access_token')->first() ?? '';
        $data['sms_trigger_invoice_overdue_notice'] = Option::where('name', 'sms_trigger_invoice_overdue_notice')->first() ?? '';
        $data['sms_trigger_invoice_due_notice'] = Option::where('name', 'sms_trigger_invoice_due_notice')->first() ?? '';
        $data['sms_trigger_invoice_payment_recorded'] = Option::where('name', 'sms_trigger_invoice_payment_recorded')->first() ?? '';
        $data['sms_trigger_estimate_expiration_reminder'] = Option::where('name', 'sms_trigger_estimate_expiration_reminder')->first() ?? '';
        $data['sms_trigger_proposal_expiration_reminder'] = Option::where('name', 'sms_trigger_proposal_expiration_reminder')->first() ?? '';
        $data['sms_trigger_proposal_new_comment_to_customer'] = Option::where('name', 'sms_trigger_proposal_new_comment_to_customer')->first() ?? '';
        $data['sms_trigger_proposal_new_comment_to_staff'] = Option::where('name', 'sms_trigger_proposal_new_comment_to_staff')->first() ?? '';
        $data['sms_trigger_contract_new_comment_to_customer'] = Option::where('name', 'sms_trigger_contract_new_comment_to_customer')->first() ?? '';
        $data['sms_trigger_contract_new_comment_to_staff'] = Option::where('name', 'sms_trigger_contract_new_comment_to_staff')->first() ?? '';
        $data['sms_trigger_contract_expiration_reminder'] = Option::where('name', 'sms_trigger_contract_expiration_reminder')->first() ?? '';
        $data['sms_trigger_contract_sign_reminder_to_customer'] = Option::where('name', 'sms_trigger_contract_sign_reminder_to_customer')->first() ?? '';
        $data['sms_trigger_staff_reminder'] = Option::where('name', 'sms_trigger_staff_reminder')->first() ?? '';
        return view('backend.setups.settings.sms', $data);
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

            return redirect()->route('settings.sms.index')->with('success', 'Option has been updated successfully!');
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
