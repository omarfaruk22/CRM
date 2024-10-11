<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GdprController extends Controller
{
    public function general()
    {
        return view('backend.setups.gdpr.general');
    }


    public function right_to_data_portability()
    {
        return view('backend.setups.gdpr.right-to-data-portability');
    }


    public function right_to_erasure()
    {
        return view('backend.setups.gdpr.right-to-erasure');
    }


    public function right_to_be_informed()
    {
        return view('backend.setups.gdpr.right-to-be-informed');
    }

    public function terms_and_Conditions()
    {
        return view('backend.setups.gdpr.terms-and-conditions');
    }

    public function knowledge_base()
    {
        return view('backend.setups.gdpr.knowledge-base');
    }

    public function privacy_policy()
    {
        return view('backend.setups.gdpr.privacy-policy');
    }

    public function right_of_access()
    {
        return view('backend.setups.gdpr.right-of-access');
    }


    public function consent()
    {
        return view('backend.setups.gdpr.consent');
    }
}
