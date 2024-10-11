<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class CustomerExport implements FromView
{
    use Exportable;

    /**
     * @return View
     */
    public function view(): View
    {
        $customers = Customer::all();
        return view('backend.customer.excel', compact('customers'));
    }
}
