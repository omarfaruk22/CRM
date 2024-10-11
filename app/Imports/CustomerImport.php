<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CustomerImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Customer([
            'company' => $row['company'] ?? null,
            'vat' => $row['vat'] ?? null,
            'phonenumber' => $row['phonenumber'] ?? null,
            'country' => $row['country'] ?? null,
            'city' => $row['city'] ?? null,
            'state' => $row['state'] ?? null,
            'zip' => $row['zip'] ?? null,
            'address' => $row['address'] ?? null,
            'website' => $row['website'] ?? null,
            'active' => $row['active'] ?? 1,
            'lead_id' => $row['lead_id'] ?? null,
            'billing_street' => $row['billing_street'] ?? null,
            'billing_city' => $row['billing_city'] ?? null,
            'billing_state' => $row['billing_state'] ?? null,
            'billing_zip' => $row['billing_zip'] ?? null,
            'billing_country' => $row['billing_country'] ?? null,
            'shipping_street' => $row['shipping_street'] ?? null,
            'shipping_city' => $row['shipping_city'] ?? null,
            'shipping_state' => $row['shipping_state'] ?? null,
            'shipping_zip' => $row['shipping_zip'] ?? null,
            'shipping_country' => $row['shipping_country'] ?? null,
            'longitude' => $row['longitude'] ?? null,
            'default_language' => $row['default_language'] ?? null,
            'default_currency' => $row['default_currency'] ?? null,
            'show_primary_contact' => $row['show_primary_contact'] ?? 0,
            'stripe_id' => $row['stripe_id'] ?? null,
            'registration_confirmed' => $row['registration_confirmed'] ?? 1,
            'addedfrom' => $row['addedfrom'] ?? 0,
            'created_by' => $row['created_by'] ?? null,
            'updated_by' => $row['updated_by'] ?? null,
        ]);
    }
}
