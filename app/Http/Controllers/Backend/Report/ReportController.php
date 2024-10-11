<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sales()
    {
        return view('backend.report.sales');
    }

    public function expenses()
    {
        return view('backend.report.expenses');
    }

    public function expensesVsIncome()
    {
        return view('backend.report.expensesvsincome');
    }

    public function leads()
    {
        return view('backend.report.leads');
    }

    public function timesheet()
    {
        return view('backend.report.timesheet');
    }

    public function kbarticles()
    {
        return view('backend.report.kbarticles');
    }
}
