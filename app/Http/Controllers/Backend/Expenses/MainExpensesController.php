<?php

namespace App\Http\Controllers\Backend\Expenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainExpensesController extends Controller
{
    public function index()
    {
        return view('backend.expenses.index');
    }

    public function recordExpence()
    {
        return view('backend.expenses.addrecord');
    }

    public function importExpence()
    {
        return view('backend.expenses.import');
    }
}
