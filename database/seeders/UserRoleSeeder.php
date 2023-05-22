<?php

namespace Database\Seeders;

use App\Models\Auth\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserRole::insert(['user_id' => 1, 'role_id' => 2]);

    }
}
