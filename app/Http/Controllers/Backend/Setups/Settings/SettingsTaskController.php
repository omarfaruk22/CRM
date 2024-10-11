<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class SettingsTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tasks_kanban_limit'] = Option::where('name', 'tasks_kanban_limit')->first() ?? '';
        $data['show_all_tasks_for_project_member'] = Option::where('name', 'show_all_tasks_for_project_member')->first() ?? '';
        $data['client_staff_add_edit_delete_task_comments_first_hour'] = Option::where('name', 'client_staff_add_edit_delete_task_comments_first_hour')->first() ?? '';
        $data['new_task_auto_assign_current_member'] = Option::where('name', 'new_task_auto_assign_current_member')->first() ?? '';
        $data['new_task_auto_follower_current_member'] = Option::where('name', 'new_task_auto_follower_current_member')->first() ?? '';
        $data['auto_stop_tasks_timers_on_new_timer'] = Option::where('name', 'auto_stop_tasks_timers_on_new_timer')->first() ?? '';
        $data['timer_started_change_status_in_progress'] = Option::where('name', 'timer_started_change_status_in_progress')->first() ?? '';
        $data['round_off_task_timer_option'] = Option::where('name', 'round_off_task_timer_option')->first() ?? '';
        $data['round_off_task_timer_time'] = Option::where('name', 'round_off_task_timer_time')->first() ?? '';
        $data['default_task_status'] = Option::where('name', 'default_task_status')->first() ?? '';
        $data['default_task_priority'] = Option::where('name', 'default_task_priority')->first() ?? '';
        $data['task_modal_class'] = Option::where('name', 'task_modal_class')->first() ?? '';
        return view('backend.setups.settings.task', $data);
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

            return redirect()->route('settings.task.index')->with('success', 'Option has been updated successfully!');
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
