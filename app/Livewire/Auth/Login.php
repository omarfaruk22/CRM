<?php

namespace App\Livewire\Auth;

use App\Models\Staff;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule([
        'email' => ['required', 'lowercase', 'email:filter', 'max:255'],
        'password' => ['required'],
    ])]

    public $email, $password, $remember = 1;

    public function login()
    {
        $user = $this->validate([
            'email' => 'required|lowercase|email:filter|max:255',
            'password' => 'required',
        ]);

        if (Auth::attempt($user, $this->remember)) {

            $user = Auth::user();
            $id = $user->id;
            $email = $user->email;
            $currentTime = Carbon::now()->format('Y-m-d H:i:s');


            $user = User::where('id', $id)->first();
            if ($user) {
                $user->update([
                    'last_login_at' => $currentTime,
                ]);
            }


            $lastLoginTime = $user->last_login_at;


            $staff = Staff::where('email', $email)->first();
            if ($staff) {
                $staff->update([
                    'last_login' => $lastLoginTime,
                ]);
            }

            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Please enter valid details!');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
