<?php

namespace Database\Seeders;

use App\Models\ExpensesCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpensesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExpensesCategory::create([
            'name' => 'IT and Internet Expenses',
            'description' => "Alice had no very clear notion how long ago anything had happened.) So she began: 'O Mouse, do you."
        ]);

        ExpensesCategory::create([
            'name' => 'Insurance',
            'description' => "NOT, being made entirely of cardboard.) 'All right, so far,' said the Queen, in a hurry: a large."
        ]);
    }
}
