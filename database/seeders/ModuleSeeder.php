<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auth\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Module::insert(['name'=>'User Management','slug'=>'user_management']);
        Module::insert(['name'=>'Role Management','slug'=>'role_management']);
        Module::insert(['name'=>'Registration Management','slug'=>'registration_management']);
    }
}
