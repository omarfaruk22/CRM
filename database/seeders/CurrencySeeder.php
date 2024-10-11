<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::create([
            'symbol' => '$',
            'name' => 'USD',
            'decimal_separator' => '.',
            'thousand_separator' => ',',
            'placement' => 'before',
            'isdefault' => 1,
        ]);

        Currency::create([
            'symbol' => '€',
            'name' => 'EUR',
            'decimal_separator' => '.',
            'thousand_separator' => ',',
            'placement' => 'before',
            'isdefault' => 0,
        ]);

        Currency::create([
            'symbol' => '₹',
            'name' => 'INR',
            'decimal_separator' => '.',
            'thousand_separator' => ',',
            'placement' => 'before',
            'isdefault' => 0,
        ]);

        Currency::create([
            'symbol' => '৳',
            'name' => 'BDT',
            'decimal_separator' => '.',
            'thousand_separator' => ',',
            'placement' => 'before',
            'isdefault' => 0,
        ]);
    }
}
