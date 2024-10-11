<?php

namespace App\Exports;

use App\Models\Estimate;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class EstimateExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Estimate::all();

        //Print static data for testing purpose
        $estimates = [
            ['title' => 'John Doe', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['title' => 'Jane Smith', 'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
        ];

        return new Collection($estimates);
    }
}
