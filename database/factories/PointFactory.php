<?php

namespace Database\Factories;

use App\Models\Point;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PointFactory extends Factory
{
    protected $model = Point::class;

    public function definition()
    {
        static $date = null;

        $date = $date ? $date->addDay() : Carbon::now();

        $userId = User::inRandomOrder()->first()->id;

        // 현재 날짜와 30일 뒤 사이의 랜덤 날짜 생성
        $expirationDate = $this->faker->optional()->dateTimeBetween('now', '+30 days');

        return [
            'user_id' => $userId,
            'points' => $this->faker->numberBetween(10, 1000),
            'type' => $this->faker->randomElement([
                Point::TYPE_REVIEW,
                Point::TYPE_PHOTO_REVIEW,
                Point::TYPE_USAGE,
                Point::TYPE_EXPIRATION,
                Point::TYPE_CANCEL,
            ]),
            'expiration_date' => $expirationDate ? $expirationDate->format('Y-m-d') : null,

            'created_at' => $date,
        ];
    }
}
