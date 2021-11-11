<?php

namespace Database\Factories;

use App\Models\Postions;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postions = Postions::inRandomOrder()->get('id')->first();
        $days = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'];
        $months = ['01', '02', '03', '04', '05', '06', '07', '08','09','10'];
        $join_date = "2021-" . Arr::random($months) . "-" . Arr::random($days) . " 01:01:01";
        return [
            'id_number' => $this->faker->numerify("############"),
            'username' => $this->faker->unique()->username(),
            'email' => $this->faker->unique()->safeEmail(),
            'fullname' => $this->faker->firstName() . ' ' .$this->faker->lastName(),
            'salary' =>rand(10000,100000),
            'phone' => $this->faker->unique()->phoneNumber,
            'is_work' => rand(0,1),
            'gender' => rand(0,1),
            'password' => bcrypt('123456789'),
            'roles_name' => ['User'],
            'postion_id' => $postions->id,
            'remember_token' => Str::random(10),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
