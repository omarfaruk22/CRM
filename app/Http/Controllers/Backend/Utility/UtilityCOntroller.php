<?php

namespace App\Http\Controllers\Backend\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UtilityCOntroller extends Controller
{
        public function media()
        {
            return view('backend.utilities.media');
        }

        public function bulkpdf()
        {
            return view('backend.utilities.bulkpdf');
        }

        public function csvexport()
        {
            return view('backend.utilities.csvexport');
        }

        public function calender()
        {
            return view('backend.utilities.calender');
        }

        public function announcements()
        {
            return view('backend.utilities.announcements');
        }

        public function activity()
        {
            return view('backend.utilities.activity');
        }

        public function database()
        {
            return view('backend.utilities.database');
        }

        public function ticketpipe()
        {
            return view('backend.utilities.ticketpipe');
        }

}
