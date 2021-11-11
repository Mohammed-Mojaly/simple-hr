<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(PostionsSeeder::class);
        $this->call(CreateAdmin::class);

         \App\Models\User::factory(100)->create();
         \App\Models\EmployeesReport::factory(50)->create();
    }
}
