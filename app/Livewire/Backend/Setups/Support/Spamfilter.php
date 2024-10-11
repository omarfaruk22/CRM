<?php

namespace App\Livewire\Backend\Setups\Support;

use App\Models\SpamFilter as ModelsSpamFilter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Spamfilter extends Component
{

    use WithPagination;
    public $id, $size = 10, $search, $type, $rel_type, $value;


    protected $rules = [
        'type' => 'required',
        'value' => 'required|string',
    ];


    public function store()
    {
        $this->validate();

        ModelsSpamFilter::create([
            'type' => $this->type,
            'value' => $this->value,
            'rel_type' => $this->rel_type = 'tickets',
            'created_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Create Successfully');
        return redirect()->route('support.spam_filter.index');
    }


    public function edit($id)
    {
        $status = ModelsSpamFilter::find($id);

        $this->id = $id;
        $this->type = $status->type;
        $this->value = $status->value;
        $this->rel_type = $status->rel_type;
    }


    public function update()
    {
        $this->validate();

        ModelsSpamFilter::find($this->id)->update([
            'type' => $this->type,
            'value' => $this->value,
            'updated_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Update Successfully');
        return redirect()->route('support.spam_filter.index');
    }


    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $status = ModelsSpamFilter::find($this->id);

        $status->delete();
        return back()->with('success', ' Status Delete Successfully');
    }


    public function render()
    {
        $senders = ModelsSpamFilter::where('type', 'sender')->where('rel_type', 'tickets')->where('value', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        $subjects = ModelsSpamFilter::where('type', 'subject')->where('rel_type', 'tickets')->where('value', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        $phrases = ModelsSpamFilter::where('type', 'phrase')->where('rel_type', 'tickets')->where('value', 'like', "%{$this->search}%")->latest()->paginate($this->size);

        return view('livewire.backend.setups.support.spamfilter')->with([
            'senders' => $senders,
            'subjects' => $subjects,
            'phrases' => $phrases,
        ]);
    }


    public function closeModal()
    {
        $this->resetInput();
    }


    public function resetInput()
    {
        $this->reset('id', 'type', 'value');
    }
}