<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;


class ContactsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Contact::all();

        //Print static data for testing purpose
        $contacts = [
            ['title' => 'John Doe', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['title' => 'Jane Smith', 'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
        ];

        return new Collection($contacts);
    }
}
