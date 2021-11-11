<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user1 = User::create([
            'id_number' => '123456789787',
            'username' => 'mojaly',
            'email' => 'admin@blackgem.hr.com',
            'fullname' => 'Mohammed Mojaly',
            'salary' => rand(10000, 100000),
            'phone' => '+96777852220',
            'gender' => 1,
            'password' => bcrypt('123456789'),
            'roles_name' =>['Admin'],
            'postion_id' =>2,
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user1->assignRole([$role->id]);


       $user2 = User::create([
            'id_number' => '123456789783',
           'username' => 'Ali',
            'email' => 'ali@blackgem.hr.com',
            'fullname' => 'Ali Ahmed',
            'salary' => rand(10000, 100000),
            'phone' => '+967775991717',
            'gender' => 1,
            'password' => bcrypt('123456789'),
            'roles_name' =>['User'],
            'postion_id' =>1,
            'remember_token' => Str::random(10),
        ]);

        $role2 = Role::create(['name' => 'User']);
        $permissions2 = Permission::pluck('id', 'id')->all();
        $role2->syncPermissions($permissions2);
        $user2->assignRole([$role2->id]);

    }
}
