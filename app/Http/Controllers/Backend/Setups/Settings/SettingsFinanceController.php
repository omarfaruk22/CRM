<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Tax;

class SettingsFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // this is general 
        $data['tax_rates'] = Tax::all() ?? '';
        $data['decimal_separator'] = Option::where('name', 'decimal_separator')->first() ?? '';
        $data['thousand_separator'] = Option::where('name', 'thousand_separator')->first() ?? '';
        $data['number_padding_prefixes'] = Option::where('name', 'number_padding_prefixes')->first() ?? '';
        $data['automatically_set_logged_in_staff_sales_agent'] = Option::where('name', 'automatically_set_logged_in_staff_sales_agent')->first() ?? '';
        $data['show_tax_per_item'] = Option::where('name', 'show_tax_per_item')->first() ?? '';
        $data['remove_tax_name_from_item_table'] = Option::where('name', 'remove_tax_name_from_item_table')->first() ?? '';
        $data['items_table_amounts_exclude_currency_symbol'] = Option::where('name', 'items_table_amounts_exclude_currency_symbol')->first() ?? '';
        $data['default_tax'] = Option::where('name', 'default_tax')->first() ?? '';
        $data['remove_decimals_on_zero'] = Option::where('name', 'remove_decimals_on_zero')->first() ?? '';
        $data['total_to_words_enabled'] = Option::where('name', 'total_to_words_enabled')->first() ?? '';
        $data['total_to_words_lowercase'] = Option::where('name', 'total_to_words_lowercase')->first() ?? '';
        // geleral end 
        // invoice 
        $data['invoice_prefix'] = Option::where('name', 'invoice_prefix')->first() ?? '';
        $data['next_invoice_number'] = Option::where('name', 'next_invoice_number')->first() ?? '';
        $data['invoice_due_after'] = Option::where('name', 'invoice_due_after')->first() ?? '';
        $data['allow_staff_view_invoices_assigned'] = Option::where('name', 'allow_staff_view_invoices_assigned')->first() ?? '';
        $data['view_invoice_only_logged_in'] = Option::where('name', 'view_invoice_only_logged_in')->first() ?? '';
        $data['delete_only_on_last_invoice'] = Option::where('name', 'delete_only_on_last_invoice')->first() ?? '';
        $data['invoice_number_decrement_on_delete'] = Option::where('name', 'invoice_number_decrement_on_delete')->first() ?? '';
        $data['exclude_invoice_from_client_area_with_draft_status'] = Option::where('name', 'exclude_invoice_from_client_area_with_draft_status')->first() ?? '';
        $data['show_sale_agent_on_invoices'] = Option::where('name', 'show_sale_agent_on_invoices')->first() ?? '';
        $data['show_project_on_invoice'] = Option::where('name', 'show_project_on_invoice')->first() ?? '';
        $data['show_total_paid_on_invoice'] = Option::where('name', 'show_total_paid_on_invoice')->first() ?? '';
        $data['show_credits_applied_on_invoice'] = Option::where('name', 'show_credits_applied_on_invoice')->first() ?? '';
        $data['show_amount_due_on_invoice'] = Option::where('name', 'show_amount_due_on_invoice')->first() ?? '';
        $data['attach_invoice_to_payment_receipt_email'] = Option::where('name', 'attach_invoice_to_payment_receipt_email')->first() ?? '';
        $data['invoice_number_format'] = Option::where('name', 'invoice_number_format')->first() ?? '';
        $data['predefined_clientnote_invoice'] = Option::where('name', 'predefined_clientnote_invoice')->first() ?? '';
        $data['predefined_terms_invoice'] = Option::where('name', 'predefined_terms_invoice')->first() ?? '';
        // end invoice 
        // credit note
        $data['credit_note_prefix'] = Option::where('name', 'credit_note_prefix')->first() ?? '';
        $data['next_credit_note_number'] = Option::where('name', 'next_credit_note_number')->first() ?? '';
        $data['credit_note_number_format'] = Option::where('name', 'credit_note_number_format')->first() ?? '';
        $data['credit_note_number_decrement_on_delete'] = Option::where('name', 'credit_note_number_decrement_on_delete')->first() ?? '';
        $data['show_project_on_credit_note'] = Option::where('name', 'show_project_on_credit_note')->first() ?? '';
        $data['predefined_clientnote_credit_note'] = Option::where('name', 'predefined_clientnote_credit_note')->first() ?? '';
        $data['predefined_terms_credit_note'] = Option::where('name', 'predefined_terms_credit_note')->first() ?? '';
        // end credit note
        // estimate 
        $data['estimate_prefix'] = Option::where('name', 'estimate_prefix')->first() ?? '';
        $data['next_estimate_number'] = Option::where('name', 'next_estimate_number')->first() ?? '';
        $data['estimate_due_after'] = Option::where('name', 'estimate_due_after')->first() ?? '';
        $data['delete_only_on_last_estimate'] = Option::where('name', 'delete_only_on_last_estimate')->first() ?? '';
        $data['estimate_number_decrement_on_delete'] = Option::where('name', 'estimate_number_decrement_on_delete')->first() ?? '';
        $data['allow_staff_view_estimates_assigned'] = Option::where('name', 'allow_staff_view_estimates_assigned')->first() ?? '';
        $data['view_estimate_only_logged_in'] = Option::where('name', 'view_estimate_only_logged_in')->first() ?? '';
        $data['show_sale_agent_on_estimates'] = Option::where('name', 'show_sale_agent_on_estimates')->first() ?? '';
        $data['show_project_on_estimate'] = Option::where('name', 'show_project_on_estimate')->first() ?? '';
        $data['estimate_auto_convert_to_invoice_on_client_accept'] = Option::where('name', 'estimate_auto_convert_to_invoice_on_client_accept')->first() ?? '';
        $data['exclude_estimate_from_client_area_with_draft_status'] = Option::where('name', 'exclude_estimate_from_client_area_with_draft_status')->first() ?? '';
        $data['estimate_number_format'] = Option::where('name', 'estimate_number_format')->first() ?? '';
        $data['estimates_pipeline_limit'] = Option::where('name', 'estimates_pipeline_limit')->first() ?? '';
        $data['default_estimates_pipeline_sort'] = Option::where('name', 'default_estimates_pipeline_sort')->first() ?? '';
        $data['default_estimates_pipeline_sort_type'] = Option::where('name', 'default_estimates_pipeline_sort_type')->first() ?? '';
        $data['predefined_clientnote_estimate'] = Option::where('name', 'predefined_clientnote_estimate')->first() ?? '';
        $data['predefined_terms_estimate'] = Option::where('name', 'predefined_terms_estimate')->first() ?? '';
        // end estimate
        // proposals
        $data['proposal_number_prefix'] = Option::where('name', 'proposal_number_prefix')->first() ?? '';
        $data['proposal_due_after'] = Option::where('name', 'proposal_due_after')->first() ?? '';
        $data['proposals_pipeline_limit'] = Option::where('name', 'proposals_pipeline_limit')->first() ?? '';
        $data['default_proposals_pipeline_sort'] = Option::where('name', 'default_proposals_pipeline_sort')->first() ?? '';
        $data['default_proposals_pipeline_sort_type'] = Option::where('name', 'default_proposals_pipeline_sort_type')->first() ?? '';
        $data['show_project_on_proposal'] = Option::where('name', 'show_project_on_proposal')->first() ?? '';
        $data['exclude_proposal_from_client_area_with_draft_status'] = Option::where('name', 'exclude_proposal_from_client_area_with_draft_status')->first() ?? '';
        $data['allow_staff_view_proposals_assigned'] = Option::where('name', 'allow_staff_view_proposals_assigned')->first() ?? '';
        $data['proposal_info_format'] = Option::where('name', 'proposal_info_format')->first() ?? '';
        // end proposals

        return view('backend.setups.settings.finance', $data);
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

            return redirect()->route('settings.finance.index')->with('success', 'Option has been updated successfully!');
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
