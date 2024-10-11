<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tax::create([
            'name' => 'TAX-1',
            'rate' => '5',
        ]);
        Tax::create([
            'name' => 'TAX-2',
            'rate' => '8',
        ]);
        Tax::create([
            'name' => 'TAX-3',
            'rate' => '15',
        ]);
        Tax::create([
            'name' => 'TAX-4',
            'rate' => '25',
        ]);
        Tax::create([
            'name' => 'TAX-5',
            'rate' => '10',
        ]);
    }
}
