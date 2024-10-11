<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\Request;
use PDF;

class StatementController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);

        $contact = Contact::where('customer_id', $customer->id)->first();
        return view('backend.customer.statements.index')->with([
            'customer' => $customer,
            'contact' => $contact,
        ]);
    }

    public function pdfdownload($id)
    {   $customer = Customer::find($id);
        $contact = Contact::where('customer_id', $customer->id)->first();
        // return[ $contact , $customer] ;
        $pdf = PDF::loadView('backend.customer.statements.downloadpdf', [
            'customer' => $customer,
            'contact' => $contact,
        ]);
        return $pdf->download('statement-invoice-of-'. $id . '.pdf');
    }

    public function pdfshow($id)
    {   $customer = Customer::find($id);
        $contact = Contact::where('customer_id', $customer->id)->first();
        // return $contact;
        $pdf = PDF::loadView('backend.customer.statements.showpdf', [
            'customer' => $customer,
            'contact' => $contact,
        ]);
        return $pdf->stream('statement-invoice-of-'. $id . '.pdf');
    }
}
