<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use Illuminate\Support\Facades\Hash;

class SettingsEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['mail_engine'] = Option::where('name', 'mail_engine')->first() ?? '';
        $data['email_protocol'] = Option::where('name', 'email_protocol')->first() ?? '';
        $data['microsoft_mail_client_id'] = Option::where('name', 'microsoft_mail_client_id')->first() ?? '';
        $data['microsoft_mail_client_secret'] = Option::where('name', 'microsoft_mail_client_secret')->first() ?? '';
        $data['microsoft_mail_azure_tenant_id'] = Option::where('name', 'microsoft_mail_azure_tenant_id')->first() ?? '';
        $data['google_mail_client_id'] = Option::where('name', 'google_mail_client_id')->first() ?? '';
        $data['google_mail_client_secret'] = Option::where('name', 'google_mail_client_secret')->first() ?? '';
        $data['smtp_encryption'] = Option::where('name', 'smtp_encryption')->first() ?? '';
        $data['smtp_host'] = Option::where('name', 'smtp_host')->first() ?? '';
        $data['smtp_port'] = Option::where('name', 'smtp_port')->first() ?? '';
        $data['smtp_email'] = Option::where('name', 'smtp_email')->first() ?? '';
        $data['smtp_username'] = Option::where('name', 'smtp_username')->first() ?? '';
        $data['smtp_password'] = Option::where('name', 'smtp_password')->first() ?? '';
        $data['smtp_email_charset'] = Option::where('name', 'smtp_email_charset')->first() ?? '';
        $data['bcc_emails'] = Option::where('name', 'bcc_emails')->first() ?? '';
        $data['email_signature'] = Option::where('name', 'email_signature')->first() ?? '';
        $data['email_header'] = Option::where('name', 'email_header')->first() ?? '';
        $data['email_footer'] = Option::where('name', 'email_footer')->first() ?? '';
        $data['email_queue_enabled'] = Option::where('name', 'email_queue_enabled')->first() ?? '';
        $data['email_queue_skip_with_attachments'] = Option::where('name', 'email_queue_skip_with_attachments')->first() ?? '';

        return view('backend.setups.settings.email', $data);
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

            return redirect()->route('settings.email.index')->with('success', 'Option has been updated successfully!');
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
