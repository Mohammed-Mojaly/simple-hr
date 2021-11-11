<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class EmployeesReportFactory extends Factory
{

    public function definition()
    {
        $user = User::inRandomOrder()->get('id')->first();

        return [
            'user_id' =>$user->id,
            'description' =>$this->faker->sentence(100),
            'status' =>rand(0,1),
        ];
    }
}
