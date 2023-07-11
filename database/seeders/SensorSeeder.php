<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sensor;

class SensorSeeder extends Seeder
{
    public function run(): void
    {
        Sensor::create([
            'sen_ph' => 0,
            'sen_turbi' => 0
        ]);
    }
}
