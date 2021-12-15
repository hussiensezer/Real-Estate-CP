<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'role_create',
            'role_edit',
            'role_destroy',
            'role_status',
            'role_access',

            'user_create',
            'user_edit',
            'user_destroy',
            'user_status',
            'user_access',

            'city_create',
            'city_edit',
            'city_destroy',
            'city_status',
            'city_access',

            'step_create',
            'step_edit',
            'step_destroy',
            'step_status',
            'step_access',

            'group_create',
            'group_edit',
            'group_destroy',
            'group_status',
            'group_access',

            'apartment_create',
            'apartment_edit',
            'apartment_destroy',
            'apartment_status',
            'apartment_whatsApp',
            'apartment_access',

        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
        $superAdmin =  Role::create([
            'name' => 'Super Admin',
        ]);

        foreach ($permissions as $permission) {
            $superAdmin->givePermissionTo($permission);
        }
    }

}
