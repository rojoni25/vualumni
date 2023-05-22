<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = new User();

        $user->name = "Mofakhkherul Islam";
        $user->email = 'webmaster2@vu.edu.bd';
        $user->password = Hash::make('@Rojoni41$');
        $user->save();
    }
}
