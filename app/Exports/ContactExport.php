<?php

namespace App\Exports;

use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ContactExport implements FromView
{
    use Exportable;
    /**
     * @return View
     */
    public function view(): View
    {
        $contacts = Contact::select('contacts.*', 'customers.company')
            ->latest('contacts.id')
            ->leftJoin('customers', 'customers.id', 'contacts.customer_id')
            ->get();

        return view('backend.customer.contact-excel', compact('contacts'));
    }
}
