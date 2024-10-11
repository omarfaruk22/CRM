<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    public function index()
    {
        return view('backend.setups.staff.index');
    }


    public function create()
    {
        return view('backend.setups.staff.create');
    }


    public function show($id)
    {
        $roles = Role::all();
        $languages = Language::all();
        $staffs = Staff::find($id);

        return view('backend.setups.staff.show')->with([
            'languages' => $languages,
            'roles' => $roles,
            'staffs' => $staffs,
        ]);
    }


    public function staffUpdate(Request $request, $id)
    {

        $staff = Staff::find($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:staff,email,' . $id,
            'password' => 'required',

        ]);



        $user = User::where('email', $staff->email)->first();
        $password = $request->password ? Hash::make($request->password) : $user->password;
        $user->update([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password,
            'role_id' => $request->role,
        ]);



        if ($request->image != null) {
            $filename = date('dmY') . time() . "." . $request->image->getClientOriginalExtension();
            $request->image->storeAs("public/users/", $filename);
        } else {
            $profileImage = $staff->profile_image;
            if ($profileImage != null) {
                $filePath = storage_path('app/public/users/' . $profileImage);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $filename = null;
        }


        $staff->update([
            'is_not_staff' => $request->is_not_staff,
            'profile_image' => $filename,
            'firstname' => $request->first_name,
            'lastname' => $request->last_name,
            'email' => $request->email,
            'hourly_rate' => $request->hourly_rate,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'linkedIn' => $request->linkedIn,
            'skype' => $request->skype,
            'role' => $request->role,
            'default_language' => $request->default_language,
            'email_signature' => $request->email_signature,
            'direction' => $request->direction,
            'admin' => $request->admin,
            'password' => $request->password,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('setup.staff.index')->with('success', 'Staff Updated Successfully');
    }



    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $isActive = $request->input('isActive');


        $staff = Staff::find($id);

        if (!$staff) {
            return response()->json(['error' => 'Staff not found'], 404);
        }

        $staff->status = $isActive;
        $staff->save();

        return response()->json(['message' => 'Status updated successfully']);
    }
}
