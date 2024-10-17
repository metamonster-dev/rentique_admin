<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        static $date = null;

        $date = $date ? $date->addDay() : Carbon::now();

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'phone_number' => $this->faker->phoneNumber,
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement([0, 1]),
            'memo' => $this->faker->sentence,
            'created_at' => $date,
        ];
    }
}
