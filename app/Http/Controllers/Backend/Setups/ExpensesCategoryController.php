<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpensesCategoryController extends Controller
{
    public function index()
    {
        return view('backend.setups.finance.expenses-categories');
    }
}
