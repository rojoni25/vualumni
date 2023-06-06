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
        Module::insert(['id'=>1,'name'=>'Dashboard','slug'=>'dashboard']);
        Module::insert(['id'=>2,'name'=>'User Management','slug'=>'user_management']);
        Module::insert(['id'=>3,'name'=>'Role Management','slug'=>'role_management']);
        Module::insert(['id'=>4,'name'=>'Registration Management','slug'=>'registration_management']);
        Module::insert(['id'=>5,'name'=>'Content Management','slug'=>'content_management']);
    }
}
