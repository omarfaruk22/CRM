<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Admin']);

        $permissions = [
            'bulk PDF export' => ['view'],
            'contracts' => ['view contracts', 'edit contracts', 'delete contracts', 'view all templates'],
            'credit Notes' => ['view credit notes', 'create credit notes', 'edit credit notes', 'delete credit notes'],
            'customers' => ['view customers', 'create customers', 'edit customers', 'delete customers'],
            'email templates' => ['view email templates', 'edit email templates'],
            'estimates' => ['view estimates', 'create estimates', 'edit estimates', 'delete estimates'],
            'expenses' => ['view expenses', 'create expenses', 'edit expenses', 'delete expenses'],
            'invoices' => ['view invoices', 'create invoices', 'edit invoices', 'delete invoices'],
            'items' => ['view items', 'create items', 'edit items', 'delete items'],
            'knowledge base' => ['view knowledge base', 'create knowledge base', 'edit knowledge base', 'delete knowledge base'],
            'payments' => ['view payments', 'create payments', 'edit payments', 'delete payments'],
            'projects' => ['view projects', 'create projects', 'edit projects', 'delete projects', 'create timesheets projects', 'edit milestones projects', 'delete milestones projects'],
            'proposals' => ['view proposals', 'create proposals', 'edit proposals', 'delete proposals'],
            'reports' => ['view reports', 'view timesheets report'],
            'staff roles' => ['view staff roles', 'create staff roles', 'edit staff roles', 'delete staff roles'],
            'settings' => ['view settings', 'edit settings'],
            'staff' => ['view staff', 'create staff', 'edit staff', 'delete staff'],
            'subscriptions' => ['view subscriptions', 'create subscriptions', 'edit subscriptions', 'delete subscriptions'],
            'tasks' => ['view tasks', 'create tasks', 'edit tasks', 'delete tasks', 'edit timesheets', 'edit timesheets', 'edit own timesheets', 'delete timesheets', 'delete own timesheets'],
            'task checklist templates' => ['create task checklist templates', 'delete task checklist templates'],
            'estimate request' => ['view estimate request', 'create estimate request', 'edit estimate request', 'delete estimate request'],
            'leads' => ['view leads', 'delete leads'],
            'surveys' => ['view surveys', 'create surveys', 'edit surveys', 'delete surveys'],
            'goals' => ['view goals', 'create goals', 'edit goals', 'delete goals'],
        ];

        foreach ($permissions as $group => $permissionNames) {
            foreach ($permissionNames as $permissionName) {
                Permission::firstOrCreate([
                    'prefix' => $group,
                    'name' => $permissionName,
                    'guard_name' => 'web',
                ]);
            }
        }

        $role->syncPermissions(Permission::all());

        $user = User::first();
        $user->assignRole($role);

        Role::create(['name' => 'Employee']);

        $user->assignRole($role);
    }
}
