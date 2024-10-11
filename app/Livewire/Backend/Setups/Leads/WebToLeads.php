<?php

namespace App\Livewire\Backend\Setups\Leads;

use App\Models\WebToLead;
use Livewire\Component;
use Livewire\WithPagination;

class WebToLeads extends Component
{

    use WithPagination;

    public $id;
    public $form_key;
    public $name;
    public $language;
    public $lead_name_prefix;
    public $lead_source;
    public $lead_status;
    public $responsible;
    public $submit_btn_name;
    public $submit_btn_bg_color;
    public $submit_btn_text_color;
    public $success_submit_msg;
    public $submit_redirect_url;
    public $submit_action;
    public $mark_public;
    public $allow_duplicate;
    public $track_duplicate_field;
    public $track_duplicate_field_and;
    public $create_task_on_duplicate;
    public $notify_type;
    public $notify_ids;
    public $created_by;

    public $search;
    public $size = 10;

    public function render()
    {
        $webToLeads = WebToLead::where('name', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.setups.leads.web-to-leads')->with([
            'webToLeads' => $webToLeads,
        ]);
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $webToLeads = WebToLead::find($this->id);
        $webToLeads->delete();

        return redirect()->route('setup.leads.webtolead.index')->with('success', 'Deleted Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset(
            'form_key',
            'name',
            'language',
            'lead_name_prefix',
            'lead_source',
            'lead_status',
            'responsible',
            'submit_btn_name',
            'submit_btn_bg_color',
            'submit_btn_text_color',
            'success_submit_msg',
            'submit_redirect_url',
            'submit_action',
            'mark_public',
            'allow_duplicate',
            'track_duplicate_field',
            'track_duplicate_field_and',
            'create_task_on_duplicate',
            'notify_type',
            'notify_ids',
            'created_by',
        );
    }
}
