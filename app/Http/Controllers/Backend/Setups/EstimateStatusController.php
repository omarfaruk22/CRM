<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstimateStatusController extends Controller
{
    public function index()
    {
        return view('backend.setups.estimateRequest.statuses.index');
    }
}
