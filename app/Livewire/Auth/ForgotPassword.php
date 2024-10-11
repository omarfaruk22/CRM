<?php

namespace App\Livewire\Auth;

use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ForgotPassword extends Component
{

    #[Rule([
        'email' => ['required', 'lowercase', 'email:filter', 'max:255'],
    ])]

    public $email;

    public function forgot_password()
    {
        // Validate the email field
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Generate token
        $token = Str::random(60);

        // Remove previous stored data from password_reset_tokens table.
        $deleted = DB::table('password_reset_tokens')->where('email', $this->email)->delete();

        // Store data to password_reset_tokens table
        $inserted = DB::table('password_reset_tokens')->insert([
            'email' => $this->email,
            'token' => $token,
            'created_at' => now(),
        ]);


        //Send Mail Here
        $user = User::where('email', $this->email)->first();

        $formData = [
            'token' => $token,
            'user' => $user,
            'mailSubject' => 'You have requested to reset password.'
        ];

        Mail::to($this->email)->send(new ResetPasswordEmail($formData));

        return redirect()->route('message')->with('success', 'Please check your inbox to reset your password.');
    }


    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
