<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function admin_profile($id)
    {

        return view('backend.profile.admin-profile');
    }
}
