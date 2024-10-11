<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['invoice_company_name'] = Option::where('name', 'invoice_company_name')->first() ?? '';
        $data['invoice_company_address'] = Option::where('name', 'invoice_company_address')->first() ?? '';
        $data['invoice_company_city'] = Option::where('name', 'invoice_company_city')->first() ?? '';
        $data['company_state'] = Option::where('name', 'company_state')->first() ?? '';
        $data['main_domains'] = Option::where('name', 'main_domain')->first() ?? '';
        $data['invoice_company_postal_code'] = Option::where('name', 'invoice_company_postal_code')->first() ?? '';
        $data['invoice_company_country_code'] = Option::where('name', 'invoice_company_country_code')->first() ?? '';
        $data['company_vat'] = Option::where('name', 'company_vat')->first() ?? '';
        $data['invoice_company_phonenumber'] = Option::where('name', 'invoice_company_phonenumber')->first() ?? '';
        $data['company_info_format'] = Option::where('name', 'company_info_format')->first() ?? '';
        return view('backend.setups.settings.companyinfo', $data);
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
            $requestDatas = $request->except('_token', '_method');

            foreach ($requestDatas as $key => $requestData) {
                Option::where('name', $key)->update([
                    'value' => $requestData
                ]);
            }

            return redirect()->back()->with('success', 'Option has been updated successfully!');
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
