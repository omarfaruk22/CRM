<?php

namespace App\Livewire\Backend\Setups\Supports;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Departments extends Component
{
    use WithPagination;

    public $id;
    public $name;
    public $hidefromclient;
    public $email;
    public $imap_username;
    public $host;
    public $password;
    public $encryption;
    public $search;
    public $size = 10;

    protected $rules = [
        'name' => 'required|string|max:255',
        // 'hidefromclient' => 'boolean',
        // 'email' => 'required|email|max:255',
        // 'imap_username' => 'required|string|max:255',
        // 'host' => 'required|string|max:255',
        // 'password' => 'required|string',
        // 'encryption' => 'required|string|in:TLS,SSL,No Encryption',
    ];

    public function store()
    {
        $this->validate();

        Department::create([
            'name' => $this->name,
            'hidefromclient' => $this->hidefromclient ?? 0,
            'email' => $this->email,
            'imap_username' => $this->imap_username,
            'host' => $this->host,
            'password' => $this->password,
            'encryption' => $this->encryption,
            'created_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Department created successfully.');

        return redirect()->route('support.department.index');
    }


    public function render()
    {
        $departments = Department::where('name', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.setups.supports.departments')->with([
            'departments' => $departments,
        ]);
    }


    public function edit($id)
    {
        $department = Department::findOrFail($id);

        $this->id = $department->id;
        $this->name = $department->name;
        $this->hidefromclient = $department->hidefromclient;
        $this->email = $department->email;
        $this->imap_username = $department->imap_username;
        $this->host = $department->host;
        $this->password = $department->password;
        $this->encryption = $department->encryption;
    }



    public function update()
    {
        $this->validate();

        Department::find($this->id)->update([
            'name' => $this->name,
            'hidefromclient' => $this->hidefromclient,
            'email' => $this->email,
            'imap_username' => $this->imap_username,
            'host' => $this->host,
            'password' => $this->password,
            'encryption' => $this->encryption,
            'updated_by' => Auth::user()->id,
        ]);

        $this->resetInput();
        session()->flash('success', 'Update Successfully');
        return redirect()->route('support.department.index');
    }



    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $department = Department::find($this->id);

        $department->delete();

        return redirect()->route('support.department.index')->with('success', ' Department Deleted Successfully');
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset('name', 'hidefromclient', 'email', 'imap_username', 'host', 'password', 'encryption');
    }
}
