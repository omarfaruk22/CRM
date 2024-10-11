<?php

namespace App\Livewire\Auth;

use App\Models\Staff;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Register extends Component
{
    #[Rule([
        'name' => 'required',
        'email' => ['required', 'lowercase', 'email:filter', 'max:255', 'unique:users,email'],
        'phone' => ['required', 'numeric'],
        'password' => ['required'],
        'confirm_password' => ['required', 'same:password'],
    ])]

    public $name, $email, $phone, $password, $confirm_password;

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email:filter',
            'phone' => 'required|numeric',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
        ]);

        $this->resetInput();

        if ($user) {

            Auth::login($user);

            $user = Auth::user();
            $id = $user->id;
            $currentTime = Carbon::now()->format('Y-m-d H:i:s');

            $user = User::where('id', $id)->first();
            if ($user) {
                $user->update([
                    'last_login_at' => $currentTime,
                ]);
            }

            return redirect()->route('dashboard')->with('success', 'Registration Successfully');
        } else {
            session()->flash('error', 'Something is Worng!');
        }
    }

    public function resetInput()
    {
        $this->reset('name', 'email', 'phone', 'password', 'confirm_password');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
