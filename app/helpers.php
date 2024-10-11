<?php

use App\Models\Staff;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\ThemeColorModal;
use App\Models\CustomerMenuColourM;
use App\Models\ButtonColorM;
use App\Models\TabColorModel;
use App\Models\ModalTheColorM;

function staff_role($id)
{
    $role = Role::find($id);

    if (!$role) {
        return 'Role not found';
    }

    return $role->name;
}

function role_use($id)
{
    return User::where('role_id', $id)->get()->count();
}

function themecolor()
{
    return ThemeColorModal::orderByDesc('id')->first();
}
