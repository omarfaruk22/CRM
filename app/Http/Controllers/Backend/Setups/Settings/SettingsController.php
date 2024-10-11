<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $data['company_logo'] = Option::where('name', 'company_logo')->first() ?? '';
        $data['company_logo_dark'] = Option::where('name', 'company_logo_dark')->first() ?? '';
        $data['favicon'] = Option::where('name', 'favicon')->first() ?? '';
        $data['companyname'] = Option::where('name', 'companyname')->first() ?? '';
        $data['main_domains'] = Option::where('name', 'main_domain')->first() ?? '';
        $data['rtl_support_admin'] = Option::where('name', 'rtl_support_admin')->first() ?? '';
        $data['rtl_support_client'] = Option::where('name', 'rtl_support_client')->first() ?? '';
        $data['allowed_files'] = Option::where('name', 'allowed_files')->first() ?? '';

        return view('backend.setups.settings.index', $data);
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
            $requestDatas = $request->except('_token', '_method', 'company_logo', 'company_logo_dark', 'favicon');
            foreach ($requestDatas as $key => $requestData) {

                Option::where('name', $key)->update([
                    'value' => $requestData
                ]);
            }

            if ($request->hasFile('company_logo')) {
                $image = $request->file('company_logo');
                $imageName = 'company_logo' . '.' . 'png';
                $directory = 'upload/logo/';
                $image->move($directory, $imageName);
                $imageUrl1 = $directory . $imageName;
            }
            if ($request->hasFile('company_logo_dark')) {
                $image = $request->file('company_logo_dark');
                $imageName = 'company_logo_dark' . '.' . 'png';
                $directory = 'upload/logo/';
                $image->move($directory, $imageName);
                $imageUrl2 = $directory . $imageName;
            }
            if ($request->hasFile('favicon')) {
                $image = $request->file('favicon');
                $imageName = 'favicon' . '.' . 'png';
                $directory = 'upload/logo/';
                $image->move($directory, $imageName);
                $imageUrl3 = $directory . $imageName;
            }



            Option::where('name', 'company_logo')->update(['value' => $imageUrl1  ?? null]);
            Option::where('name', 'company_logo_dark')->update(['value' => $imageUrl2  ?? null]);
            Option::where('name', 'favicon')->update(['value' => $imageUrl3  ?? null]);

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
