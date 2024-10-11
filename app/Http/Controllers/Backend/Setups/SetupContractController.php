<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetupContractController extends Controller
{
    public function index()
    {
        return view('backend.setups.contracts.index');
    }
}
