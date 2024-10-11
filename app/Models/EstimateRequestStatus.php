<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateRequestStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function estimateRequestForms()
    {
        return $this->hasMany(EstimateRequestForm::class, 'status', 'id');
    }
}
