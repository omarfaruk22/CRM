<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagtable extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function tagnames()
    {
        return $this->hasOne(Tag::class,);
    }
}
