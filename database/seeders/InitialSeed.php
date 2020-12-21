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
        $user = User::create([
            'name' => 'root',
            'email' => 'root@starter.local',
            'password' => Hash::make('1234'),
        ]);
        $user->assignRole('Root');

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleManager = Role::create(['name' => 'Manager']);
        $roleEditor = Role::create(['name' => 'Editor']);
        $roleUser = Role::create(['name' => 'User']);
        $rolePermissions = [
            Permission::create(['name' => 'grant role']),
            Permission::create(['name' => 'revoke role'])
        ];
        $postPermission = [
            Permission::create(['name' => 'create post']),
            Permission::create(['name' => 'read post']),
            Permission::create(['name' => 'update post']),
            Permission::create(['name' => 'delete post']),
            Permission::create(['name' => 'publish post']),
            Permission::create(['name' => 'unpublish post']),
        ];
        $roleAdmin->givePermissionTo($rolePermissions);
        $roleAdmin->givePermissionTo($postPermission);
    }
}
