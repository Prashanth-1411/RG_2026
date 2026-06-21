<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        BlogCategory::create(['name' => 'Health Tips', 'slug' => 'health-tips', 'status' => true]);
        BlogCategory::create(['name' => 'Service Updates', 'slug' => 'service-updates', 'status' => true]);
        BlogCategory::create(['name' => 'Community', 'slug' => 'community', 'status' => true]);
    }
}
