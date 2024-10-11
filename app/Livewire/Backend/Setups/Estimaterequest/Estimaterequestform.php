<?php

namespace App\Livewire\Backend\Setups\Estimaterequest;

use App\Models\EstimateRequestForm as ModelsEstimateRequestForm;
use App\Models\EstimateRequestStatus;
use Livewire\Component;
use App\Models\Language;
use App\Models\LeadsSource;
use App\Models\LeadsStatus;
use App\Models\Staff;
use Livewire\WithPagination;

class Estimaterequestform extends Component
{

    use WithPagination;

    public $id, $language, $status_id, $form_name, $responsible_id, $button_text_name, $button_background_color,
        $button_background_text, $redirect_url, $display_message, $notify_member, $notify_role, $responsible_person;

    protected $rules = [
        'form_name' => 'required|string|max:255',
        'language' => 'required',
        'status_id' => 'required',
        'responsible_id' => 'required',
    ];

    public function store()
    {
        $this->validate();
        ModelsEstimateRequestForm::create([
            'form_name' => $this->form_name,
            'language' => $this->language,
            'status_id' => $this->status_id,
            'responsible_id' => $this->responsible_id,
            'button_text_name' => $this->button_text_name,
            'button_background_color' => $this->button_background_color,
            'button_background_text' => $this->button_background_text,
            'redirect_url' => $this->redirect_url,
            'display_message' => $this->display_message,
            'notify_member' => $this->notify_member,
            'notify_role' => $this->notify_role,
            'responsible_person' => $this->responsible_person ?? '0',
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Create Successfully');
    }

    public function render()
    {
        $statuses = EstimateRequestStatus::all();
        $sources = LeadsSource::all();
        $responsibles = Staff::all();
        $languages = Language::all();
        return view('livewire.backend.setups.estimaterequest.estimaterequestform', compact('statuses', 'sources', 'responsibles', 'languages'));
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->reset(
            'id',
            'form_name',
            'language',
            'status_id',
            'responsible_id',
            'button_text_name',
            'button_background_color',
            'button_background_text',
            'redirect_url',
            'display_message',
            'notify_member',
            'notify_role',
            'responsible_person'
        );
    }
}
