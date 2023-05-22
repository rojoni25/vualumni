<?php

namespace Database\Seeders;

use App\Models\Auth\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::insert(['name' => 'No Role', 'slug' => 'no_role', 'status' => 1]);
        Role::insert(['name' => 'Super Admin', 'slug' => 'super_admin', 'status' => 1]);
        Role::insert(['name' => 'Admin', 'slug' => 'admin', 'status' => 1]);
    }
}
