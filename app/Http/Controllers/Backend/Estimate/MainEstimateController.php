<?php

namespace App\Http\Controllers\Backend\Estimate;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\EstimateRequestForm as ModelsEstimateRequestForm;
use App\Models\EstimateRequestStatus;
use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class MainEstimateController extends Controller
{

    public function index()
    {
        return view('backend.estimate.index');
    }


    public function create()
    {
        $languages = Language::all();
        $responsibles = Staff::all();
        $estimateRequestStatuses = EstimateRequestStatus::all();
        $roles = Role::all();
        return view('backend.estimate.create', compact('languages', 'responsibles', 'estimateRequestStatuses', 'roles'));
    }


    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'language' => 'required|integer',
            'status' => 'required|integer',
            'responsible' => 'required|integer',
            'submit_btn_name' => 'required|string|max:255',
        ];

        if ($request->submit_action == 1) {
            $rules['submit_redirect_url'] = 'required';
        }

        if ($request->submit_action == 0) {
            $rules['success_submit_msg'] = 'required';
        }

        $request->validate($rules);

        $authUserId = Auth::user()->id;


        if (is_array($request->notify_ids)) {
            $notify_ids = implode(',', $request->notify_ids);
        } else {
            $notify_ids = $request->notify_ids;
        }


        $estimateRequestForm = new ModelsEstimateRequestForm();
        $estimateRequestForm->type = $request->type;
        $estimateRequestForm->name = $request->name;
        $estimateRequestForm->form_data = $request->form_data;
        $estimateRequestForm->recaptcha = $request->recaptcha;
        $estimateRequestForm->status = $request->status;
        $estimateRequestForm->submit_btn_name = $request->submit_btn_name;
        $estimateRequestForm->submit_btn_bg_color = $request->submit_btn_bg_color;
        $estimateRequestForm->submit_btn_text_color = $request->submit_btn_text_color;
        $estimateRequestForm->success_submit_msg = $request->success_submit_msg;
        $estimateRequestForm->submit_action = $request->submit_action;
        $estimateRequestForm->submit_redirect_url = $request->submit_redirect_url;
        $estimateRequestForm->language = $request->language;
        $estimateRequestForm->notify_type = $request->notify_type;
        $estimateRequestForm->notify_ids = $notify_ids;
        $estimateRequestForm->responsible = $request->responsible;
        $estimateRequestForm->notify_request_submitted = $request->notify_request_submitted;
        $estimateRequestForm->created_by = $authUserId;

        $estimateRequestForm->save();

        return redirect()->route('estimate.index')->with('success', 'Created successfully');
    }



    public function show()
    {
        return view('backend.estimate.show');
    }


    public function edit($id)
    {
        $estimateRequests = ModelsEstimateRequestForm::find($id);

        $languages = Language::all();
        $responsibles = Staff::all();
        $estimateRequestStatuses = EstimateRequestStatus::all();
        $roles = Role::all();
        return view('backend.estimate.edit', compact('languages', 'responsibles', 'estimateRequestStatuses', 'roles', 'estimateRequests'));
    }


    public function update(Request $request, $id)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'language' => 'required|integer',
            'status' => 'required|integer',
            'responsible' => 'required|integer',
            'submit_btn_name' => 'required|string|max:255',
        ];

        if ($request->submit_action == 1) {
            $rules['submit_redirect_url'] = 'required';
        }

        if ($request->submit_action == 0) {
            $rules['success_submit_msg'] = 'required';
        }

        $request->validate($rules);

        $authUserId = Auth::user()->id;


        if (is_array($request->notify_ids)) {
            $notify_ids = implode(',', $request->notify_ids);
        } else {
            $notify_ids = $request->notify_ids;
        }


        $EstimateRequest = ModelsEstimateRequestForm::find($id);
        $EstimateRequest->type = $request->type;
        $EstimateRequest->name = $request->name;
        $EstimateRequest->form_data = $request->form_data;
        $EstimateRequest->recaptcha = $request->recaptcha;
        $EstimateRequest->status = $request->status;
        $EstimateRequest->submit_btn_name = $request->submit_btn_name;
        $EstimateRequest->submit_btn_bg_color = $request->submit_btn_bg_color;
        $EstimateRequest->submit_btn_text_color = $request->submit_btn_text_color;
        $EstimateRequest->success_submit_msg = $request->success_submit_msg;
        $EstimateRequest->submit_action = $request->submit_action;
        $EstimateRequest->submit_redirect_url = $request->submit_redirect_url;
        $EstimateRequest->language = $request->language;
        $EstimateRequest->notify_type = $request->notify_type;
        $EstimateRequest->notify_ids = $notify_ids;
        $EstimateRequest->responsible = $request->responsible;
        $EstimateRequest->notify_request_submitted = $request->notify_request_submitted;
        $EstimateRequest->created_by = $authUserId;

        $EstimateRequest->save();

        return redirect()->route('estimate.index')->with('success', 'Updated successfully');
    }


    public function delete($id)
    {

        $deleteEstimateRequest = ModelsEstimateRequestForm::find($id);

        if (!$deleteEstimateRequest) {
            return redirect()->route('estimate.index')->with('error', 'Estimate request not found');
        }

        $deleteEstimateRequest->delete();

        return redirect()->route('estimate.index')->with('success', 'Estimate request deleted successfully');
    }


    public function form_store(Request $request, $id)
    {
        $EstimateRequest = ModelsEstimateRequestForm::find($id);

        $EstimateRequest->update([
            'form_data' => $request->form_data,
        ]);

        return redirect()->route('estimate.edit', $id)->with('success', 'Form created successfully');
    }
}
