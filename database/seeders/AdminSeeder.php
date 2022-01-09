<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'f_name' => 'Admin',
            'l_name' => 'Account',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'phone' => '01093347242',
        	'password' => Hash::make('admin@gmail.com'),
            'status' => 1,
            'avatar' => 'avatar.jpg',
        ]);

        $role = Role::create(['name' => 'مدير النظام', 'guard_name' => 'web']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);
    }
}
