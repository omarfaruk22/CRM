<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'company',
        'vat',
        'phonenumber',
        'country',
        'city',
        'state',
        'zip',
        'address',
        'website',
        'active',
        'lead_id',
        'billing_street',
        'billing_city',
        'billing_state',
        'billing_zip',
        'billing_country',
        'shipping_street',
        'shipping_city',
        'shipping_state',
        'shipping_zip',
        'shipping_country',
        'longitude',
        'latitude',
        'default_language',
        'default_currency',
        'show_primary_contact',
        'stripe_id',
        'registration_confirmed',
        'addedfrom',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function contact()
    {
         return $this->hasMany(Contact::class);
    }

}
