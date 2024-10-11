<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function Files()
    {
        return $this->hasOne(File::class, 'comment_id', 'id')->where('rel_type', 'task');
    }
}
