<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesCreditNoteController extends Controller
{
    public function index()
    {
        return view('backend.sales.notes.index');
    }

    public function createCN()
    {
        return view('backend.sales.notes.createCN');
    }

    public function editCN($id)
    {
        return view('backend.sales.notes.editCN');
    }

    public function deleteCreditnote($id)
    {
        return $id;
    }
}
