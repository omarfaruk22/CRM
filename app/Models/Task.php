<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function assignees()
    {
        return $this->hasMany(TaskAssigne::class, 'taskid', 'id');
    }
    public function tagables()
    {
        return $this->hasMany(Tagtable::class, 'rel_id', 'id')->where('rel_type', 'task');
    }


    public function taskAssigne()
    {
        return $this->hasOne(TaskAssigne::class, 'taskid', 'id');
    }

    public function projects()
    {
        return $this->hasOne(Project::class, 'id', 'rel_id');
    }
    public function invoices()
    {
        return $this->hasOne(Invoice::class, 'id', 'rel_id');
    }
    public function customers()
    {
        return $this->hasOne(Customer::class, 'id', 'rel_id');
    }
    public function estimates()
    {
        return $this->hasOne(Estimate::class, 'id', 'rel_id');
    }
    public function contracts()
    {
        return $this->hasOne(Contract::class, 'id', 'rel_id');
    }
    public function tickets()
    {
        return $this->hasOne(Ticket::class, 'id', 'rel_id');
    }
    public function expences()
    {
        return $this->hasOne(Expense::class, 'id', 'rel_id');
    }
    public function leads()
    {
        return $this->hasOne(MainLead::class, 'id', 'rel_id');
    }
    public function proposals()
    {
        return $this->hasOne(Proposal::class, 'id', 'rel_id');
    }
}
