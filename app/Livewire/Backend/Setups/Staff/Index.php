<?php

namespace App\Livewire\Backend\Setups\Staff;

use App\Models\Staff;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    public $id, $search, $size = 10;


    public function render()
    {
        $data['roles'] = Role::all();
        $data['staffs'] = Staff::where('firstname', 'like', "%{$this->search}%")->latest()->paginate($this->size);
        return view('livewire.backend.setups.staff.index', $data);
    }


    public function delete($id)
    {
        $this->id = $id;
    }


    public function destroy()
    {
        $staff = Staff::find($this->id);

        $user = User::where('email', $staff->email)->first();
        $user->delete();

        if ($staff) {
            $profileImage = $staff->profile_image;

            if ($profileImage != null) {
                $filePath = storage_path('app/public/users/' . $profileImage);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $staff->delete();
            return redirect()->route('setup.staff.index')->with('success', 'Deleted Successfully');
        } else {
            return redirect()->route('setup.staff.index')->with('error', 'Staff member not found');
        }
    }



    public function closeModal()
    {
        $this->resetInput();
    }


    public function resetInput()
    {
        $this->reset('id');
    }
}
