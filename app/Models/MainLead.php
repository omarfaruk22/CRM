<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainLead extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function source()
    {
        return $this->hasMany(LeadsSource::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
