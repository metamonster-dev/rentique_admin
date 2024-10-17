<?php

namespace Database\Factories;

use App\Models\ShippingAddress;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingAddressFactory extends Factory
{
    protected $model = ShippingAddress::class;

    public function definition()
    {
        static $date = null;

        $date = $date ? $date->addDay() : Carbon::now();

        $userId = User::inRandomOrder()->first()->id;

        return [
            'user_id' => $userId,
            'address_name' => $this->faker->word, // 배송지 이름
            'recipient_name' => $this->faker->name, // 수령인 이름
            'phone_number_1' => $this->faker->phoneNumber, // 연락처 1
            'phone_number_2' => $this->faker->optional()->phoneNumber, // 연락처 2
            'post_code' => $this->faker->postcode, // 우편번호
            'address1' => $this->faker->address, // 주소 1
            'address2' => $this->faker->optional()->address, // 주소 2
//            'is_default' => $this->faker->boolean(20), // 20% 확률로 기본 배송지
            'is_default' => 0,
            'created_at' => $date
        ];
    }
}
