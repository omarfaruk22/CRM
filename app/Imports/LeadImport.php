<?php

namespace App\Imports;

use App\Models\MainLead;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeadImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            MainLead::create([
                'hash' => $row['hash'] ?? null,
                'name' => $row['name'] ?? null,
                'title' => $row['title'] ?? null,
                'company' => $row['company'] ?? null,
                'description' => $row['description'] ?? null,
                'country' => $row['country'] ?? '0',
                'zip' => $row['zip'] ?? null,
                'city' => $row['city'] ?? null,
                'language' => $row['language'] ?? null,
                'state' => $row['state'] ?? null,
                'address' => $row['address'] ?? null,
                'assigned' => $row['assigned'] ?? 0,
                'dateadded' => $row['dateadded'] ?? null,
                'from_form_id' => $row['from_form_id'] ?? 0,
                'status' => $row['status'] ?? '0',
                'source' => $row['source'] ?? null,
                'lastcontact' => $row['lastcontact'] ?? null,
                'dateassigned' => $row['dateassigned'] ?? null,
                'last_status_change' => $row['last_status_change'] ?? null,
                'addedfrom' => $row['addedfrom'] ?? 0,
                'email' => $row['email'] ?? null,
                'website' => $row['website'] ?? null,
                'leadorder' => $row['leadorder'] ?? 1,
                'phonenumber' => $row['phonenumber'] ?? null,
                'date_converted' => $row['date_converted'] ?? null,
                'lost' => $row['lost'] ?? 0,
                'junk' => $row['junk'] ?? 0,
                'last_lead_status' => $row['last_lead_status'] ?? 0,
                'is_imported_from_email_integration' => $row['is_imported_from_email_integration'] ?? 0,
                'email_integration_uid' => $row['email_integration_uid'] ?? null,
                'is_public' => $row['is_public'] ?? 0,
                'default_language' => $row['default_language'] ?? null,
                'client_id' => $row['client_id'] ?? 0,
                'lead_value' => $row['lead_value'] ?? null,

            ]);
        }
    }
}
