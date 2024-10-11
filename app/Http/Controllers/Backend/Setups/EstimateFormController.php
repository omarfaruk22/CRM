<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class EstimateFormController extends Controller
{
    public function index()
    {
        return view('backend.setups.estimateRequest.forms.index');
    }

    public function create()
    {
        $languages = Language::all();
        return view('backend.setups.estimateRequest.forms.create')->with([
            'languages' => $languages,
        ]);
    }

    public function show()
    {
        return view('backend.setups.estimateRequest.forms.show');
    }

    public function edit()
    {
        $languages = Language::all();
        return view('backend.setups.estimateRequest.forms.edit')->with([
            'languages' => $languages,
        ]);
    }
}
