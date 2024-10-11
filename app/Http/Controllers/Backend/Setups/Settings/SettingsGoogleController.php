<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class SettingsGoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['google_api_key'] = Option::where('name', 'google_api_key')->first() ?? '';
        $data['google_client_id'] = Option::where('name', 'google_client_id')->first() ?? '';
        $data['recaptcha_site_key'] = Option::where('name', 'recaptcha_site_key')->first() ?? '';
        $data['recaptcha_secret_key'] = Option::where('name', 'recaptcha_secret_key')->first() ?? '';
        $data['use_recaptcha_customers_area'] = Option::where('name', 'use_recaptcha_customers_area')->first() ?? '';
        $data['recaptcha_ignore_ips'] = Option::where('name', 'recaptcha_ignore_ips')->first() ?? '';
        $data['google_calendar_main_calendar'] = Option::where('name', 'google_calendar_main_calendar')->first() ?? '';
        $data['enable_google_picker'] = Option::where('name', 'enable_google_picker')->first() ?? '';

        return view('backend.setups.settings.google', $data);
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

            return redirect()->route('settings.google.index')->with('success', 'Option has been updated successfully!');
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
