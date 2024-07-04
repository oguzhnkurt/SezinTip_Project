<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // User modeli için
use Illuminate\Support\Facades\Hash; // Hash sınıfını kullanmak için
use Spatie\Permission\Models\Role; // Role modeli için

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::firstOrCreate(
            ['email' => 'admin@sezintip.com'],
            ['name' => 'Admin', 'surname' => '', 'password' => Hash::make('password')]
        );
        
        $user = User::firstOrCreate(
            ['email' => 'oguzhan@sezintip.com'],
            ['name' => 'Normal', 'surname' => '', 'password' => Hash::make('123')]
        );

        $admin->assignRole($adminRole);
        $user->assignRole($userRole);
    }
}
