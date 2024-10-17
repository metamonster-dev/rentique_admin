<?php

namespace Database\Seeders;

use App\Models\Point;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    public function run()
    {
        Point::factory()->count(30)->create();
    }
}
