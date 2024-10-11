<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function tagables()
    {
        return $this->hasMany(Tagtable::class, 'rel_id', 'id')->where('rel_type', 'project');
    }
}
