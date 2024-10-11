<?php

namespace App\Livewire\Backend\Setups\Staff;

use App\Models\Language;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class Create extends Component
{

    use WithFileUploads;


    public $is_not_staff = 0,
        $role,
        $image,
        $first_name,
        $last_name,
        $email,
        $hourly_rate,
        $phone,
        $facebook,
        $linkedIn,
        $skype,
        $default_language = 1,
        $email_signature,
        $direction,
        $administrator,
        $send_email,
        $password,
        $show_password = 0;



    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);


        if ($this->image != null) {
            $filename = date('dmY') . time() . "." . $this->image->getClientOriginalExtension();
            $this->image->storeAs("public/users/", $filename);
        } else {
            $filename = null;
        }


        Staff::create([
            'is_not_staff' => $this->is_not_staff,
            'profile_image' => $filename,
            'firstname' => $this->first_name,
            'lastname' => $this->last_name,
            'email' => $this->email,
            'hourly_rate' => $this->hourly_rate ?? 0,
            'phone' => $this->phone,
            'facebook' => $this->facebook,
            'linkedIn' => $this->linkedIn,
            'skype' => $this->skype,
            'role' => $this->role,
            'default_language' => $this->default_language,
            'email_signature' => $this->email_signature,
            'direction' => $this->direction,
            'admin' => $this->administrator,
            'password' => $this->password,
            'created_by' => Auth::user()->id,
        ]);

        $user = User::create([
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'role_id' => $this->role,
        ]);


        $role = Role::find($this->role);
        $user->assignRole($role);
        $this->resetInput();


        return redirect()->route('setup.staff.index')->with('success', 'Staff Create Successfully');
    }



    public function resetInput()
    {
        $this->reset(
            'image',
            'first_name',
            'last_name',
            'email',
            'hourly_rate',
            'phone',
            'facebook',
            'linkedIn',
            'skype',
            'default_language',
            'email_signature',
            'direction',
            'administrator',
            'send_email',
            'password',
        );
    }

    public function password_generate()
    {
        $this->password = Str::random(12);
    }

    public function password_show()
    {
        $this->show_password = 1;
    }

    public function password_hide()
    {
        $this->show_password = 0;
    }

    public function render()
    {
        $data['languages'] = Language::all();
        $data['roles'] = Role::all();

        return view('livewire.backend.setups.staff.create', $data);
    }
}
