<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'first_name' => $faker->first_name,
        'last_name' => $faker->last_name,
        'mobile_num' => $faker->unique()->mobile_num,
        'date_of_birth' => $faker->date_of_birth,
        'gender' => $faker->gender,
        'city' => $faker->city,
        'comm_address' => $faker->comm_address,
        'userName' => $faker->unique()->userName,
        'user_password' => $faker->unique()->user_password,

        ];
    }
}
