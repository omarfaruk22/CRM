<?php

namespace App\Livewire\Backend\EstimateRequest;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EstimateRequestForm;
use App\Models\Staff;
use Spatie\Permission\Models\Role;

class EstimateRequest extends Component
{
    use WithPagination;

    public $id;
    public $name;
    public $search;
    public $size = 10;

    public function render()
    {
        $estimateRequestForms = EstimateRequestForm::with('staff', 'estimateRequestStatus', 'creator', 'updator')->where('name', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.estimate-request.estimate-request')->with([
            'estimateRequestForms' => $estimateRequestForms,
        ]);
    }
}
