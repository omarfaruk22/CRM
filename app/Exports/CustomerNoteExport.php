<?php
// app/Exports/CustomerNoteExport.php

namespace App\Exports;

use App\Models\Note;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerNoteExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Return specific columns from the 'notes' table
        return Note::select('id', 'rel_id', 'rel_type', 'date_contacted', 'description')
            ->get();
    }

    public function headings(): array
    {
        // Define column names for the first row
        return ['ID', 'Related ID', 'Related Type', 'Date Contacted', 'Description'];
    }
}
