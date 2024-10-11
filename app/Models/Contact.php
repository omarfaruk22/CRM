<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contact()
    {
        return $this->belongsTo(Customer::class, 'id');
    }

    public function contactPermission()
    {
        return $this->hasMany(Contact_Permission::class, 'contact_userid', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id');
    }

}
