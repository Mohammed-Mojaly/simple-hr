<?php

namespace Database\Seeders;

use App\Models\Postions;
use Illuminate\Database\Seeder;

class PostionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postions::create([
           'name' => 'Mobile Development',
           'is_active' => 1,
        ]);
        Postions::create([
           'name' => 'Web Development',
           'is_active' => 1,
        ]);
        Postions::create([
           'name' => 'Desktop Apps',
           'is_active' => 1,
        ]);
        Postions::create([
           'name' => 'Graphical Design',
           'is_active' => 1,
        ]);
        Postions::create([
           'name' => 'E-Marckteing',
           'is_active' => 1,
        ]);
    }
}
