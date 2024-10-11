<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeadsStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function leads()
    // {
    //     return $this->belongsTo(Mainlead::class);
    // }
}
