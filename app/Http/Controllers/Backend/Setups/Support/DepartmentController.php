<?php

namespace App\Http\Controllers\Backend\Setups\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        return view('backend.setups.support.department.index');
    }
}
