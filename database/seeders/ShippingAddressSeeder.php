<?php

namespace Database\Seeders;

use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Database\Seeder;

class ShippingAddressSeeder extends Seeder
{
    public function run()
    {
        User::all()->each(function ($user) {
            // 각 사용자에게 3개의 배송지 생성
            ShippingAddress::factory()->count(3)->create([
                'user_id' => $user->id,
            ]);

            // 생성된 배송지 중 하나를 기본 배송지로 설정
            $shippingAddress = ShippingAddress::where('user_id', $user->id)->inRandomOrder()->first();
            $shippingAddress->is_default = 1;
            $shippingAddress->save();
        });
    }
}
