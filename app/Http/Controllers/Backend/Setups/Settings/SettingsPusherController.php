<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class SettingsPusherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pusher_app_id'] = Option::where('name', 'pusher_app_id')->first() ?? '';
        $data['pusher_app_key'] = Option::where('name', 'pusher_app_key')->first() ?? '';
        $data['pusher_app_secret'] = Option::where('name', 'pusher_app_secret')->first() ?? '';
        $data['pusher_cluster'] = Option::where('name', 'pusher_cluster')->first() ?? '';
        $data['pusher_realtime_notifications'] = Option::where('name', 'pusher_realtime_notifications')->first() ?? '';
        $data['desktop_notifications'] = Option::where('name', 'desktop_notifications')->first() ?? '';
        $data['auto_dismiss_desktop_notifications_after'] = Option::where('name', 'auto_dismiss_desktop_notifications_after')->first() ?? '';
        return view('backend.setups.settings.pusher', $data);
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

            return redirect()->route('settings.pusher.index')->with('success', 'Option has been updated successfully!');
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
