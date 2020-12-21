<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Root']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Editor']);
        Role::create(['name' => 'User']);
        $user = User::create([
            'name' => 'root',
            'email' => 'root@starter.local',
            'password' => Hash::make('1234'),
        ]);
        $user->assignRole('Root');
    }
}
