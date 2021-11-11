<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'List-Roles',
            'Create-Roles',
            'Edit-Roles',
            'Delete-Roles',

            'List-Employees',
            'Create-Employees',
            'Edit-Employees',
            'Delete-Employees',

            'List-Reports',
            'Create-Reports',
            'Aproved-Reports',
            'Delete-Reports',

            'List-Jobs',
            'Create-Jobs',
            'Edit-Jobs',
            'Delete-Jobs',


            'Show-Statistics',


        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
