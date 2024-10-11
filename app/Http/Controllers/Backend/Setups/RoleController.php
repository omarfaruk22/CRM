<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.setups.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['groupedPermissions'] = Permission::all()->groupBy('prefix');

        return view('backend.setups.roles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        $permissions = [];

        foreach ($request->permissions as $value) {
            $permission = Permission::find($value);
            array_push($permissions, $permission);
        }

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', 'Role Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['role'] = Role::findOrFail($id);
        $data['groupedPermissions'] = Permission::all()->groupBy('prefix');

        return view('backend.setups.roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => "required|unique:roles,name,$role->id,id",
        ]);

        $role->update([
            'name' => $request->name,
            'guard_name' => 'web',
            'updated_at' => date("Y-m-d h:i:sa"),
        ]);

        $permissions = [];

        foreach ($request->permissions as $value) {
            $permission = Permission::find($value);
            array_push($permissions, $permission);
        }

        $role->syncPermissions($permissions);

        return back()->with('success', 'Role Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
