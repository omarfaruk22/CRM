<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateRequestForm extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function staff()
    {
        return $this->belongsTo(Staff::class, 'responsible', 'id');
    }


    public function estimateRequestStatus()
    {
        return $this->belongsTo(EstimateRequestStatus::class, 'status', 'id');
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


    public function updator()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
