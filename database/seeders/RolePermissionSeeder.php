<?php

namespace Database\Seeders;

use App\Models\Auth\RolePermission;
use Illuminate\Database\Seeder;
use App\Models\Auth\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        foreach (Permission::all() as $key => $permission) {
            RolePermission::insert(['role_id'=> '2', 'permission_id'=> $permission->id]);
        }
        RolePermission::insert(['role_id'=> '3', 'permission_id'=> '1', ]);
    }
}
