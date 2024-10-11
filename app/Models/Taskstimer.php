<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskstimer extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function timerstaff()
    {
        return $this->hasOne(User::class, 'id', 'staff_id');
    }
}
