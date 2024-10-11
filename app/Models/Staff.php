<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function estimateRequestForms()
    {
        return $this->hasMany(EstimateRequestForm::class, 'responsible', 'id');
    }
}
