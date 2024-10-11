<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use App\Models\Countrie;
use App\Models\Currencie;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\ItemGroup;
use App\Models\Priority;
use App\Models\Relation;
use App\Models\SaleStatus;
use App\Models\Staff;
use App\Models\Tag;
use App\Models\TbItem;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SalesInvoiceController extends Controller
{
    public function index()
    {
        return view('backend.sales.invoice.index');
    }



    public function createInvoice()
    {

        $data['customers'] = Customer::all();
        // $data['leads'] = MainLead::all();
        // $data['contacts'] = Contact::all();
        $data['taxes']  =  Tag::all();
        $data['priorities'] = Priority::all();
        $data['tags'] = Tag::all();
        $data['staffs'] = Staff::all();
        $data['statuses'] = SaleStatus::all();
        $data['countries'] = Countrie::all();
        $data['currencies'] = Currency::all();
        $data['relations'] = Relation::all();
        $data['items'] = TbItem::all();
        $data['groups']  = ItemGroup::all();
        return view('backend.sales.invoice.createInvoice', $data);
    }

    public function storeInvoice(Request $request)
    {
        // ashdaj
    }

    public function editInvoice(Request $request, $id)
    {
        return view('backend.sales.invoice.editInvoice');
    }

    public function deleteInvoice($id)
    {
        return $id;
    }


    public function recurringInvoice()
    {
        return view('backend.sales.invoice.recurringInvoice');
    }
}
