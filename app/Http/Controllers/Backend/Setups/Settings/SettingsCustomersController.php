<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Countrie;
use App\Models\SettingVisibleTab;
use App\Models\SettingRequiredField;
use App\Models\EstimateRequestForm;

class SettingsCustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['country'] = Countrie::all() ?? '';
        $data['visibles'] = SettingVisibleTab::all() ?? '';
        $data['requiredfields'] = SettingRequiredField::all() ?? '';
        $data['estimate_areas'] = EstimateRequestForm::all() ?? '';
        $data['clients_default_theme'] = Option::where('name', 'clients_default_theme')->first() ?? '';
        $data['customer_default_country'] = Option::where('name', 'customer_default_country')->first() ?? '';
        $data['visible_customer_profile_tabs'] = Option::where('name', 'visible_customer_profile_tabs')->first() ?? '';
        $data['required_register_fields'] = Option::where('name', 'required_register_fields')->first() ?? '';
        $data['company_is_required'] = Option::where('name', 'company_is_required')->first() ?? '';
        $data['company_requires_vat_number_field'] = Option::where('name', 'company_requires_vat_number_field')->first() ?? '';
        $data['allow_registration'] = Option::where('name', 'allow_registration')->first() ?? '';
        $data['customers_register_require_confirmation'] = Option::where('name', 'customers_register_require_confirmation')->first() ?? '';
        $data['allow_primary_contact_to_manage_other_contacts'] = Option::where('name', 'allow_primary_contact_to_manage_other_contacts')->first() ?? '';
        $data['enable_honeypot_spam_validation'] = Option::where('name', 'enable_honeypot_spam_validation')->first() ?? '';
        $data['allow_primary_contact_to_view_edit_billing_and_shipping'] = Option::where('name', 'allow_primary_contact_to_view_edit_billing_and_shipping')->first() ?? '';
        $data['only_own_files_contacts'] = Option::where('name', 'only_own_files_contacts')->first() ?? '';
        $data['allow_contact_to_delete_files'] = Option::where('name', 'allow_contact_to_delete_files')->first() ?? '';
        $data['use_knowledge_base'] = Option::where('name', 'use_knowledge_base')->first() ?? '';
        $data['knowledge_base_without_registration'] = Option::where('name', 'knowledge_base_without_registration')->first() ?? '';
        $data['show_estimate_request_in_customers_area'] = Option::where('name', 'show_estimate_request_in_customers_area')->first() ?? '';
        $data['default_contact_permissions'] = Option::where('name', 'default_contact_permissions')->first() ?? '';
        $data['customer_info_format'] = Option::where('name', 'customer_info_format')->first() ?? '';


        return view('backend.setups.settings.customer', $data);
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
        // dd($request->all());
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

            return redirect()->route('settings.customers.index')->with('success', 'Option has been updated successfully!');
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
