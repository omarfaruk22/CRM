<?php

namespace App\Http\Controllers\Backend\Contract;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use DateTime;
use DateInterval;


class MainContractController extends Controller
{


    public function index()
    {

        $now = new DateTime();
        $nowString = $now->format('Y-m-d H:i:s');

        $contacts = Contact::all();
        $totalContracts = $contacts->count();

        $lastLogin7DaysAgo = clone $now;
        $lastLogin7DaysAgo->sub(new DateInterval('P7D'));

        $lastLogin20DaysAgo = clone $now;
        $lastLogin20DaysAgo->sub(new DateInterval('P20D'));

        $lastLogin30DaysAgo = clone $now;
        $lastLogin30DaysAgo->sub(new DateInterval('P30D'));

        $recentlyAddedCount = Contact::whereBetween('last_login', [$lastLogin7DaysAgo->format('Y-m-d H:i:s'), $nowString])->count();

        $aboutToExpireCount = Contact::whereBetween('last_login', [$lastLogin20DaysAgo->format('Y-m-d H:i:s'), $lastLogin7DaysAgo->format('Y-m-d H:i:s')])->count();

        $expiredCount = Contact::whereBetween('last_login', [$lastLogin30DaysAgo->format('Y-m-d H:i:s'), $lastLogin20DaysAgo->format('Y-m-d H:i:s')])->count();

        return view('backend.contract.index', [
            'contacts' => $contacts,
            'abouttoexpire' => $aboutToExpireCount,
            'expired' => $expiredCount,
            'recentlyadded' => $recentlyAddedCount,
            'totalContracts' => $totalContracts,
        ]);
    }


    public function create()
    {
        return view('backend.contract.create');
    }
}
