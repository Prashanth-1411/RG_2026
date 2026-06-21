<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        Statistic::create(['label' => 'Years of Service', 'value' => 15, 'suffix' => '+', 'sort_order' => 1, 'status' => true]);
        Statistic::create(['label' => 'Ambulances Available', 'value' => 50, 'suffix' => '+', 'sort_order' => 2, 'status' => true]);
        Statistic::create(['label' => 'Patients Served', 'value' => 50000, 'suffix' => '+', 'sort_order' => 3, 'status' => true]);
        Statistic::create(['label' => 'Cities Covered', 'value' => 100, 'suffix' => '+', 'sort_order' => 4, 'status' => true]);
    }
}
