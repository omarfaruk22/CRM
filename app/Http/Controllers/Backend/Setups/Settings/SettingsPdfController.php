<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\SettingsPdffont;
use App\Models\SettingsDocumentformat;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class SettingsPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // general 
        $data['fonts'] = SettingsPdffont::all() ?? '';
        $data['formats'] = SettingsDocumentformat::all() ?? '';
        $data['pdf_font'] = Option::where('name', 'pdf_font')->first() ?? '';
        $data['swap_pdf_info'] = Option::where('name', 'swap_pdf_info')->first() ?? '';
        $data['pdf_font_size'] = Option::where('name', 'pdf_font_size')->first() ?? '';
        $data['pdf_table_heading_color'] = Option::where('name', 'pdf_table_heading_color')->first() ?? '';
        $data['pdf_table_heading_text_color'] = Option::where('name', 'pdf_table_heading_text_color')->first() ?? '';
        $data['custom_pdf_logo_image_url'] = Option::where('name', 'custom_pdf_logo_image_url')->first() ?? '';
        $data['pdf_logo_width'] = Option::where('name', 'pdf_logo_width')->first() ?? '';
        $data['show_status_on_pdf_ei'] = Option::where('name', 'show_status_on_pdf_ei')->first() ?? '';
        $data['show_pay_link_to_invoice_pdf'] = Option::where('name', 'show_pay_link_to_invoice_pdf')->first() ?? '';
        $data['show_transactions_on_invoice_pdf'] = Option::where('name', 'show_transactions_on_invoice_pdf')->first() ?? '';
        $data['show_page_number_on_pdf'] = Option::where('name', 'show_page_number_on_pdf')->first() ?? '';
        // end feneral 
        // signature 
        $data['show_pdf_signature_invoice'] = Option::where('name', 'show_pdf_signature_invoice')->first() ?? '';
        $data['show_pdf_signature_estimate'] = Option::where('name', 'show_pdf_signature_estimate')->first() ?? '';
        $data['show_pdf_signature_credit_note'] = Option::where('name', 'show_pdf_signature_credit_note')->first() ?? '';
        $data['show_pdf_signature_contract'] = Option::where('name', 'show_pdf_signature_contract')->first() ?? '';
        $data['show_pdf_signature_proposal'] = Option::where('name', 'show_pdf_signature_proposal')->first() ?? '';
        $data['signature_image'] = Option::where('name', 'signature_image')->first() ?? '';

        // end signature
        // format 
        $data['pdf_format_invoice'] = Option::where('name', 'pdf_format_invoice')->first() ?? '';
        $data['pdf_format_estimate'] = Option::where('name', 'pdf_format_estimate')->first() ?? '';
        $data['pdf_format_proposal'] = Option::where('name', 'pdf_format_proposal')->first() ?? '';
        $data['pdf_format_payment'] = Option::where('name', 'pdf_format_payment')->first() ?? '';
        $data['pdf_format_credit_note'] = Option::where('name', 'pdf_format_credit_note')->first() ?? '';
        $data['pdf_format_contract'] = Option::where('name', 'pdf_format_contract')->first() ?? '';
        $data['pdf_format_statement'] = Option::where('name', 'pdf_format_statement')->first() ?? '';
        // end 
        return view('backend.setups.settings.pdf', $data);
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
            $optionDatas = $request->except('_token', '_method', 'signature_image');

            foreach ($optionDatas as $key => $optionData) {
                if (is_array($optionData)) {
                    $optionData = json_encode($optionData);
                }

                Option::where('name', $key)->update([
                    'value' => $optionData
                ]);
            }

            if ($request->hasFile('signature_image')) {
                $image = $request->file('signature_image');
                $imageName = 'signature_image' . '.' . 'png';
                $directory = 'upload/logo/';
                $image->move($directory, $imageName);
                $imageUrl1 = $directory . $imageName;
            }


            Option::where('name', 'signature_image')->update(['value' => $imageUrl1  ?? null]);

            return redirect()->route('settings.pdf.index')->with('success', 'Option has been updated successfully!');
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
