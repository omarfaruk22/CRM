<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailTemplatesController extends Controller
{
    public function index()
    {
        return view('backend.setups.emailTemplate.index');
    }

    public function template()
    {
        return view('backend.setups.emailTemplate.template');
    }
}
