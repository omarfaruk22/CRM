<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Language;
use App\Models\DefaultTimezone;

class LocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['languages'] = Language::all() ?? '';
        $data['timezones'] = DefaultTimezone::all() ?? '';
        // $data['timezones'] = DefaultTimezone::where('name', $data['time_groups']->group_name) ?? '';
        $data['dateformat'] = Option::where('name', 'dateformat')->first() ?? '';
        $data['time_format'] = Option::where('name', 'time_format')->first() ?? '';
        $data['default_timezone'] = Option::where('name', 'default_timezone')->first() ?? '';
        $data['active_language'] = Option::where('name', 'active_language')->first() ?? '';
        $data['disable_language'] = Option::where('name', 'disable_language')->first() ?? '';
        $data['output_client_pdfs_from_admin_area_in_client_language'] = Option::where('name', 'output_client_pdfs_from_admin_area_in_client_language')->first() ?? '';
        return view('backend.setups.settings.localization', $data);
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


                Option::where('name', $key)->update([
                    'value' => $optionData
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
