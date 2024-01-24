<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $createTaskPermission = Permission::firstOrCreate(['name' => 'create task']);
        $editTaskPermission = Permission::firstOrCreate(['name' => 'edit task']);
        $deleteTaskPermission = Permission::firstOrCreate(['name' => 'delete task']);
        $viewTaskPermission = Permission::firstOrCreate(['name' => 'view task']);
        $viewFeedbackPermission = Permission::firstOrCreate(['name' => 'view feedback']);
        $giveFeedbackPermission = Permission::firstOrCreate(['name' => 'give feedback']);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo([
            $createTaskPermission,
            $editTaskPermission,
            $deleteTaskPermission,
            $viewTaskPermission,
            $viewFeedbackPermission
        ]);

        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $managerRole->givePermissionTo([
            $createTaskPermission,
            $editTaskPermission,
            $viewTaskPermission,
            $viewFeedbackPermission,
        ]);

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->givePermissionTo([
            $viewTaskPermission,
            $giveFeedbackPermission
        ]);
    }
}
