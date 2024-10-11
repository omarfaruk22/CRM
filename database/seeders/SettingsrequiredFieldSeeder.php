<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsrequiredFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requriedfield = [
            ['name' => 'First Name - Contact', 'value' => 'contact_firstname'],
            ['name' => 'Last Name - Contact	', 'value' => 'contact_lastname'],
            ['name' => 'Email Address - Contact', 'value' => 'contact_email'],
            ['name' => 'Phone - Contact	', 'value' => 'contact_contact_phonenumber'],
            ['name' => 'Website - Contact', 'value' => 'contact_website'],
            ['name' => 'Position - Contact', 'value' => 'contact_title'],
            ['name' => 'Company - Company', 'value' => 'company_company'],
            ['name' => 'VAT Number - Company', 'value' => 'company_vat'],
            ['name' => 'Phone - Company	', 'value' => 'company_phonenumber'],
            ['name' => 'Country - Company', 'value' => 'company_country'],
            ['name' => 'City - Company', 'value' => 'company_city'],
            ['name' => 'Address - Company', 'value' => 'company_address'],
            ['name' => 'Zip Code - Company	', 'value' => 'company_zip'],
            ['name' => 'State - Company	', 'value' => 'company_state'],
        ];
        DB::table('setting_required_fields')->insert($requriedfield);
    }
}
