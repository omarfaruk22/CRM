<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Exports\EstimateExport;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EstimateController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.estimate.index')->with(['customer' => $customer]);
    }

    public function create()
    {
        return view('backend.customer.estimate.create');
    }

    public function show()
    {
        return view('backend.customer.estimate.show');
    }

    public function edit()
    {
        return view('backend.customer.estimate.edit');
    }

    public function zip_estimate()
    {
        // $contacts = Contact::all();

        //Assign static data for testing purpose 
        $estimates = [
            ['title' => 'John Doe', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['title' => 'Jane Smith', 'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
            // Add more sample contacts as needed
        ];

        $fileName = 'estimates.pdf';
        $html = view('backend.customer.estimate.zip_estimate', compact('estimates'))->render();
        $mpdf = new \Mpdf\Mpdf();

        // Define footer content with page number
        $footer = '<div style="text-align: right; font-size: 10px;">Page {PAGENO}</div>';
        $mpdf->SetFooter($footer);


        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }


    public function estimates_invoice()
    {
        // Assign static data for testing purpose 
        $estimatesInvoice = [
            ['title' => 'John Doe', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['title' => 'Jane Smith', 'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
            // Add more sample contacts as needed
        ];

        $fileName = 'estimatesInvoice.pdf';
        $html = view('backend.customer.estimate.estimates_invoice', compact('estimatesInvoice'))->render();
        $mpdf = new \Mpdf\Mpdf();


        // Define footer content with page number
        $footer = '<div style="text-align: right; font-size: 10px;">Page {PAGENO}</div>';
        $mpdf->SetFooter($footer);

        // Write HTML content to PDF
        $mpdf->WriteHTML($html);

        // Output PDF as inline file
        $mpdf->Output($fileName, 'I');
    }


    public function pdf()
    {
        $estimates = [
            ['title' => 'John Doe', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['title' => 'Jane Smith', 'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
            // Add more sample contacts as needed
        ];

        $fileName = 'estimates.pdf';
        $html = view('backend.customer.estimate.pdf', compact('estimates'))->render();
        $mpdf = new \Mpdf\Mpdf();

        // Define footer content with page number
        $footer = '<div style="text-align: right; font-size: 10px;">Page {PAGENO}</div>';
        $mpdf->SetFooter($footer);


        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'D');
    }

    public function excel()
    {
        return Excel::download(new EstimateExport, 'estimates.xlsx');
    }

    public function excel_file()
    {
        return view('backend.customer.estimate.excel');
    }
}
