<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class SettingsPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // general 
        $data['notification_when_customer_pay_invoice'] = Option::where('name', 'notification_when_customer_pay_invoice')->first() ?? '';
        $data['allow_payment_amount_to_be_modified'] = Option::where('name', 'allow_payment_amount_to_be_modified')->first() ?? '';
        // end general 
        // authorize 
        $data['paymentmethod_authorize_acceptjs_active'] = Option::where('name', 'paymentmethod_authorize_acceptjs_active')->first() ?? '';
        $data['paymentmethod_authorize_acceptjs_label'] = Option::where('name', 'paymentmethod_authorize_acceptjs_label')->first() ?? '';
        $data['paymentmethod_authorize_acceptjs_public_key'] = Option::where('name', 'paymentmethod_authorize_acceptjs_public_key')->first() ?? '';
        $data['paymentmethod_authorize_acceptjs_api_login_id'] = Option::where('name', 'paymentmethod_authorize_acceptjs_api_login_id')->first() ?? '';
        $data['paymentmethod_authorize_acceptjs_api_transaction_key'] = Option::where('name', 'paymentmethod_authorize_acceptjs_api_transaction_key')->first() ?? '';
        $data['paymentmethod_authorize_acceptjs_description_dashboard'] = Option::where('name', 'paymentmethod_authorize_acceptjs_description_dashboard')->first() ?? '';
        $data['paymentmethod_authorize_acceptjs_currencies'] = Option::where('name', 'paymentmethod_authorize_acceptjs_currencies')->first() ?? '';
        $data['paymentmethod_authorize_acceptjs_test_mode_enabled'] = Option::where('name', 'paymentmethod_authorize_acceptjs_test_mode_enabled')->first() ?? '';
        $data['paymentmethod_authorize_acceptjs_default_selected'] = Option::where('name', 'paymentmethod_authorize_acceptjs_default_selected')->first() ?? '';
        // end authorize 
        // instamo 
        $data['paymentmethod_instamojo_active'] = Option::where('name', 'paymentmethod_instamojo_active')->first() ?? '';
        $data['paymentmethod_instamojo_label'] = Option::where('name', 'paymentmethod_instamojo_label')->first() ?? '';
        $data['paymentmethod_instamojo_fee_fixed'] = Option::where('name', 'paymentmethod_instamojo_fee_fixed')->first() ?? '';
        $data['paymentmethod_instamojo_fee_percent'] = Option::where('name', 'paymentmethod_instamojo_fee_percent')->first() ?? '';
        $data['paymentmethod_instamojo_api_key'] = Option::where('name', 'paymentmethod_instamojo_api_key')->first() ?? '';
        $data['paymentmethod_instamojo_auth_token'] = Option::where('name', 'paymentmethod_instamojo_auth_token')->first() ?? '';
        $data['paymentmethod_instamojo_description_dashboard'] = Option::where('name', 'paymentmethod_instamojo_description_dashboard')->first() ?? '';
        $data['paymentmethod_instamojo_currencies'] = Option::where('name', 'paymentmethod_instamojo_currencies')->first() ?? '';
        $data['paymentmethod_instamojo_test_mode_enabled'] = Option::where('name', 'paymentmethod_instamojo_test_mode_enabled')->first() ?? '';
        $data['paymentmethod_instamojo_default_selected'] = Option::where('name', 'paymentmethod_instamojo_default_selected')->first() ?? '';
        // end instamo 
        // mollie 
        $data['paymentmethod_mollie_active'] = Option::where('name', 'paymentmethod_mollie_active')->first() ?? '';
        $data['paymentmethod_mollie_label'] = Option::where('name', 'paymentmethod_mollie_label')->first() ?? '';
        $data['paymentmethod_mollie_api_key'] = Option::where('name', 'paymentmethod_mollie_api_key')->first() ?? '';
        $data['paymentmethod_mollie_description_dashboard'] = Option::where('name', 'paymentmethod_mollie_description_dashboard')->first() ?? '';
        $data['paymentmethod_mollie_currencies'] = Option::where('name', 'paymentmethod_mollie_currencies')->first() ?? '';
        $data['paymentmethod_mollie_test_mode_enabled'] = Option::where('name', 'paymentmethod_mollie_test_mode_enabled')->first() ?? '';
        $data['paymentmethod_mollie_default_selected'] = Option::where('name', 'paymentmethod_mollie_default_selected')->first() ?? '';
        // end mollie 
        // braintree 
        $data['paymentmethod_paypal_braintree_active'] = Option::where('name', 'paymentmethod_paypal_braintree_active')->first() ?? '';
        $data['paymentmethod_paypal_braintree_label'] = Option::where('name', 'paymentmethod_paypal_braintree_label')->first() ?? '';
        $data['paymentmethod_paypal_braintree_merchant_id'] = Option::where('name', 'paymentmethod_paypal_braintree_merchant_id')->first() ?? '';
        $data['paymentmethod_paypal_braintree_api_public_key'] = Option::where('name', 'paymentmethod_paypal_braintree_api_public_key')->first() ?? '';
        $data['paymentmethod_paypal_braintree_api_private_key'] = Option::where('name', 'paymentmethod_paypal_braintree_api_private_key')->first() ?? '';
        $data['paymentmethod_paypal_braintree_currencies'] = Option::where('name', 'paymentmethod_paypal_braintree_currencies')->first() ?? '';
        $data['paymentmethod_paypal_braintree_paypal_enabled'] = Option::where('name', 'paymentmethod_paypal_braintree_paypal_enabled')->first() ?? '';
        $data['paymentmethod_paypal_braintree_test_mode_enabled'] = Option::where('name', 'paymentmethod_paypal_braintree_test_mode_enabled')->first() ?? '';
        $data['paymentmethod_paypal_braintree_default_selected'] = Option::where('name', 'paymentmethod_paypal_braintree_default_selected')->first() ?? '';
        // end braintree 
        // paypal smart 
        $data['paymentmethod_paypal_checkout_active'] = Option::where('name', 'paymentmethod_paypal_checkout_active')->first() ?? '';
        $data['paymentmethod_paypal_checkout_label'] = Option::where('name', 'paymentmethod_paypal_checkout_label')->first() ?? '';
        $data['paymentmethod_paypal_checkout_fee_fixed'] = Option::where('name', 'paymentmethod_paypal_checkout_fee_fixed')->first() ?? '';
        $data['paymentmethod_paypal_checkout_fee_percent'] = Option::where('name', 'paymentmethod_paypal_checkout_fee_percent')->first() ?? '';
        $data['paymentmethod_paypal_checkout_client_id'] = Option::where('name', 'paymentmethod_paypal_checkout_client_id')->first() ?? '';
        $data['paymentmethod_paypal_checkout_secret'] = Option::where('name', 'paymentmethod_paypal_checkout_secret')->first() ?? '';
        $data['paymentmethod_paypal_checkout_payment_description'] = Option::where('name', 'paymentmethod_paypal_checkout_payment_description')->first() ?? '';
        $data['paymentmethod_paypal_checkout_currencies'] = Option::where('name', 'paymentmethod_paypal_checkout_currencies')->first() ?? '';
        $data['paymentmethod_paypal_checkout_test_mode_enabled'] = Option::where('name', 'paymentmethod_paypal_checkout_test_mode_enabled')->first() ?? '';
        $data['paymentmethod_paypal_checkout_default_selected'] = Option::where('name', 'paymentmethod_paypal_checkout_default_selected')->first() ?? '';
        //end  paypal smart 
        // paypal 
        $data['paymentmethod_paypal_active'] = Option::where('name', 'paymentmethod_paypal_active')->first() ?? '';
        $data['paymentmethod_paypal_label'] = Option::where('name', 'paymentmethod_paypal_label')->first() ?? '';
        $data['paymentmethod_paypal_fee_fixed'] = Option::where('name', 'paymentmethod_paypal_fee_fixed')->first() ?? '';
        $data['paymentmethod_paypal_fee_percent'] = Option::where('name', 'paymentmethod_paypal_fee_percent')->first() ?? '';
        $data['paymentmethod_paypal_username'] = Option::where('name', 'paymentmethod_paypal_username')->first() ?? '';
        $data['paymentmethod_paypal_password'] = Option::where('name', 'paymentmethod_paypal_password')->first() ?? '';
        $data['paymentmethod_paypal_signature'] = Option::where('name', 'paymentmethod_paypal_signature')->first() ?? '';
        $data['paymentmethod_paypal_description_dashboard'] = Option::where('name', 'paymentmethod_paypal_description_dashboard')->first() ?? '';
        $data['paymentmethod_paypal_currencies'] = Option::where('name', 'paymentmethod_paypal_currencies')->first() ?? '';
        $data['paymentmethod_paypal_test_mode_enabled'] = Option::where('name', 'paymentmethod_paypal_test_mode_enabled')->first() ?? '';
        $data['paymentmethod_paypal_default_selected'] = Option::where('name', 'paymentmethod_paypal_default_selected')->first() ?? '';
        //end paypal 
        // payu 
        $data['paymentmethod_payu_money_active'] = Option::where('name', 'paymentmethod_payu_money_active')->first() ?? '';
        $data['paymentmethod_payu_money_label'] = Option::where('name', 'paymentmethod_payu_money_label')->first() ?? '';
        $data['paymentmethod_payu_money_fee_fixed'] = Option::where('name', 'paymentmethod_payu_money_fee_fixed')->first() ?? '';
        $data['paymentmethod_payu_money_fee_percent'] = Option::where('name', 'paymentmethod_payu_money_fee_percent')->first() ?? '';
        $data['paymentmethod_payu_money_key'] = Option::where('name', 'paymentmethod_payu_money_key')->first() ?? '';
        $data['paymentmethod_payu_money_salt'] = Option::where('name', 'paymentmethod_payu_money_salt')->first() ?? '';
        $data['paymentmethod_payu_money_description_dashboard'] = Option::where('name', 'paymentmethod_payu_money_description_dashboard')->first() ?? '';
        $data['paymentmethod_payu_money_currencies'] = Option::where('name', 'paymentmethod_payu_money_currencies')->first() ?? '';
        $data['paymentmethod_payu_money_test_mode_enabled'] = Option::where('name', 'paymentmethod_payu_money_test_mode_enabled')->first() ?? '';
        $data['paymentmethod_payu_money_default_selected'] = Option::where('name', 'paymentmethod_payu_money_default_selected')->first() ?? '';
        // end payu 
        // stripe chack 
        $data['paymentmethod_stripe_active'] = Option::where('name', 'paymentmethod_stripe_active')->first() ?? '';
        $data['paymentmethod_stripe_label'] = Option::where('name', 'paymentmethod_stripe_label')->first() ?? '';
        $data['paymentmethod_stripe_fee_fixed'] = Option::where('name', 'paymentmethod_stripe_fee_fixed')->first() ?? '';
        $data['paymentmethod_stripe_fee_percent'] = Option::where('name', 'paymentmethod_stripe_fee_percent')->first() ?? '';
        $data['paymentmethod_stripe_api_publishable_key'] = Option::where('name', 'paymentmethod_stripe_api_publishable_key')->first() ?? '';
        $data['paymentmethod_stripe_api_secret_key'] = Option::where('name', 'paymentmethod_stripe_api_secret_key')->first() ?? '';
        $data['paymentmethod_stripe_description_dashboard'] = Option::where('name', 'paymentmethod_stripe_description_dashboard')->first() ?? '';
        $data['paymentmethod_stripe_currencies'] = Option::where('name', 'paymentmethod_stripe_currencies')->first() ?? '';
        $data['paymentmethod_stripe_allow_primary_contact_to_update_credit_card'] = Option::where('name', 'paymentmethod_stripe_allow_primary_contact_to_update_credit_card')->first() ?? '';
        $data['paymentmethod_stripe_default_selected'] = Option::where('name', 'paymentmethod_stripe_default_selected')->first() ?? '';
        // end stripe chack 
        //  stripe ideal  
        $data['paymentmethod_stripe_ideal_active'] = Option::where('name', 'paymentmethod_stripe_ideal_active')->first() ?? '';
        $data['paymentmethod_stripe_ideal_label'] = Option::where('name', 'paymentmethod_stripe_ideal_label')->first() ?? '';
        $data['paymentmethod_stripe_ideal_api_secret_key'] = Option::where('name', 'paymentmethod_stripe_ideal_api_secret_key')->first() ?? '';
        $data['paymentmethod_stripe_ideal_api_publishable_key'] = Option::where('name', 'paymentmethod_stripe_ideal_api_publishable_key')->first() ?? '';
        $data['paymentmethod_stripe_ideal_description_dashboard'] = Option::where('name', 'paymentmethod_stripe_ideal_description_dashboard')->first() ?? '';
        $data['paymentmethod_stripe_ideal_statement_descriptor'] = Option::where('name', 'paymentmethod_stripe_ideal_statement_descriptor')->first() ?? '';
        $data['paymentmethod_stripe_ideal_currencies'] = Option::where('name', 'paymentmethod_stripe_ideal_currencies')->first() ?? '';
        $data['paymentmethod_stripe_ideal_default_selected'] = Option::where('name', 'paymentmethod_stripe_ideal_default_selected')->first() ?? '';
        //end  stripe ideal  
        // 2chack 
        $data['paymentmethod_two_checkout_active'] = Option::where('name', 'paymentmethod_two_checkout_active')->first() ?? '';
        $data['paymentmethod_two_checkout_label'] = Option::where('name', 'paymentmethod_two_checkout_label')->first() ?? '';
        $data['paymentmethod_two_checkout_fee_fixed'] = Option::where('name', 'paymentmethod_two_checkout_fee_fixed')->first() ?? '';
        $data['paymentmethod_two_checkout_fee_percent'] = Option::where('name', 'paymentmethod_two_checkout_fee_percent')->first() ?? '';
        $data['paymentmethod_two_checkout_merchant_code'] = Option::where('name', 'paymentmethod_two_checkout_merchant_code')->first() ?? '';
        $data['paymentmethod_two_checkout_secret_key'] = Option::where('name', 'paymentmethod_two_checkout_secret_key')->first() ?? '';
        $data['paymentmethod_two_checkout_description'] = Option::where('name', 'paymentmethod_two_checkout_description')->first() ?? '';
        $data['paymentmethod_two_checkout_currencies'] = Option::where('name', 'paymentmethod_two_checkout_currencies')->first() ?? '';
        $data['paymentmethod_two_checkout_test_mode_enabled'] = Option::where('name', 'paymentmethod_two_checkout_test_mode_enabled')->first() ?? '';
        $data['paymentmethod_two_checkout_default_selected'] = Option::where('name', 'paymentmethod_two_checkout_default_selected')->first() ?? '';
        // end 2chack 
        return view('backend.setups.settings.payment_gateway', $data);
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

            return redirect()->route('settings.payment.index')->with('success', 'Option has been updated successfully!');
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
