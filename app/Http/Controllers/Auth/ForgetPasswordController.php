<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class ForgetPasswordController extends Controller
{

    public function index()
    {
        return view('auth.forget_password');
    }


    public function message()
    {
        return view('message');
    }


    public function resetPassword($token)
    {

        $tokenExist = DB::table('password_reset_tokens')->where('token', $token)->first();

        if ($tokenExist == null) {
            return redirect()->route('forgot_password')->with('error', 'Invalid request.');
        }

        return view('auth.reset-password')->with('token', $token);
    }


    public function processResetPassword(Request $request)
    {
        $token = $request->token;

        $tokenObj = DB::table('password_reset_tokens')->where('token', $token)->first();

        if ($tokenObj == null) {
            return redirect()->route('forget_passsword')->with('error', 'Invalid request.');
        }

        $user = User::where('email', $tokenObj->email)->first();

        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return redirect()->route('resetPassword', $token)->withErrors($validator);
        }

        User::where('id', $user->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        // After update password remove token from password_reset_tokens table.
        DB::table('password_reset_tokens')->where('email', $user->email)->delete();

        return redirect()->route('login')->with('success', 'You have successfully updated your password.');
    }
}
