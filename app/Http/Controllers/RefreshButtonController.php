<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefreshButtonController extends Controller
{
    public function index()
    {
        return redirect()->back();
    }
}
