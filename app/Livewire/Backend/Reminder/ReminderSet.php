<?php

namespace App\Livewire\Backend\Reminder;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\Contact;
use App\Models\MainLead;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ReminderSet extends Component
{
    public $customer_id, $customer, $search;
    public $id;
    public $date;
    public $staffs, $staff;
    public $reminder_id;
    public $isnotified;
    public $description;
    public $notify_by_email;
    public $rel_id;
    public $lead_id;
    public $rel_type;
    public $created_by;
    public $updated_by;
    public $reminderto;

    public $size = 10;
    use WithPagination;


    protected $rules = [
        'date' => 'required|date',
        'reminderto' => 'required|exists:staff,id',
        'description' => 'nullable|string',

    ];

    public function render()
    {
        $data['leads'] = MainLead::all();
        $data['staffes'] = Staff::all();

        $data['reminders'] = Reminder::where(function ($query) {
            $query->where('id', 'like', "%{$this->search}%")
                ->orWhere('date', 'like', "%{$this->search}%")
                ->orWhere('staff', 'like', "%{$this->search}%")
                ->orWhere('isnotified', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%")
                ->orWhere('notify_by_email', 'like', "%{$this->search}%")
                ->orWhere('rel_id', 'like', "%{$this->search}%")
                ->orWhere('customer_id', 'like', "%{$this->search}%")
                ->orWhere('lead_id', 'like', "%{$this->search}%")
                ->orWhere('rel_type', 'like', "%{$this->search}%")
                ->orWhere('created_by', 'like', "%{$this->search}%")
                ->orWhere('updated_by', 'like', "%{$this->search}%")
                ->orWhere('created_at', 'like', "%{$this->search}%")
                ->orWhere('updated_at', 'like', "%{$this->search}%");
        })->latest()->paginate($this->size);

        return view('livewire.backend.reminder.reminder-set', $data);
    }

    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;
        $this->customer = Customer::find($this->customer_id);
    }

    public function reminderStore()
    {

        // dd($this);
        $this->validate();

        Reminder::create([
            'date' => $this->date,
            'staff' => $this->reminderto,
            'description' => $this->description,
            'notify_by_email' => $this->notify_by_email,
            'customer_id' => $this->customer_id, // Ensure customer_id is set
        ]);

        session()->flash('message', 'Reminder successfully created.');
        $this->resetInput();

        // Pass the customer_id parameter when redirecting
        return redirect()->route('customers.profile.reminders', ['id' => $this->customer_id]);
    }

    private function resetInput()
    {
        $this->date = null;
        $this->staffs = null;
        $this->isnotified = null;
        $this->description = null;
        $this->notify_by_email = null;
        $this->rel_id = null;
        $this->lead_id = null;
        $this->rel_type = null;
        $this->created_by = null;
        $this->updated_by = null;
    }




    public function closeModal()
    {
        $this->resetInput();
    }

    public function editReminder($id)
    {

        $reminder = Reminder::findOrFail($id);
        $this->id               = $reminder->id;
        $this->reminderto       = $reminder->staff;
        $this->description      = $reminder->description;
        $this->notify_by_email  = $reminder->notify_by_email;
        $this->date             = $reminder->date;
    }

    public function updateReminder()
    {
        $this->validate();

        $reminder = Reminder::find($this->id);
        $reminder->update([
            'date' => $this->date,
            'staff' => $this->reminderto,
            'description' => $this->description,
            'notify_by_email' => $this->notify_by_email,
            'customer_id' => $this->customer_id,
        ]);

        session()->flash('message', 'Reminder successfully updated.');
        $this->resetInput();

        return redirect()->route('customers.profile.reminders', ['id' => $this->customer_id]);
    }


    public function deleteReminderPop($id)
    {
        $this->reminder_id = $id;
    }

    public function deleteReminder()
    {
        Reminder::findOrFail($this->reminder_id)->delete();

        session()->flash('message', 'Reminder successfully deleted.');
        $this->resetInput();

        return redirect()->route('customers.profile.reminders', ['id' => $this->customer_id]);
    }
}
