<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FieldBelongsto;

class FieldNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fieldname = [
            ['field_name' => 'Company'],
            ['field_name' => 'Leads'],
            ['field_name' => 'Customers'],
            ['field_name' => 'Contacts'],
            ['field_name' => 'Staff'],
            ['field_name' => 'Contracts'],
            ['field_name' => 'Tasks'],
            ['field_name' => 'Expenses'],
            ['field_name' => 'Invoice'],
            ['field_name' => 'Items'],
            ['field_name' => 'Credit Note'],
            ['field_name' => 'Estimate'],
            ['field_name' => 'Proposal'],
            ['field_name' => 'Projects'],
            ['field_name' => 'Tickets'],

        ];
        DB::table('field_belongstos')->insert($fieldname);
    }
}
