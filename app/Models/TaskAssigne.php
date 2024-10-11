<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssigne extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function task()
    {
        return $this->belongsTo(Task::class, 'taskid', 'id');
    }
    // public function getStaffNamesArray()
    // {
    //     // Assuming 'staff_names' is the column name in your table
    //     $staffNamesString = $this->staffid;

    //     // Explode the string into an array
    //     $staffNamesArray = explode(',', $staffNamesString);

    //     return $staffNamesArray;
    // }
    public function staff()
    {
        return $this->belongsTo(User::class, 'staffid', 'id');
    }
}
