<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuSetupController extends Controller
{
    public function main_menu()
    {
        return view('backend.setups.menuSetup.main-menu');
    }

    public function setup_menu()
    {
        return view('backend.setups.menuSetup.setup-menu');
    }
}
