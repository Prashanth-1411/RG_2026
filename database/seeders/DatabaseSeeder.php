<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            SettingSeeder::class,
            ConfigurationSeeder::class,
            NavigationItemSeeder::class,
            PageSeeder::class,
            HeroSlideSeeder::class,
            StatisticSeeder::class,
            FeaturedSectionSeeder::class,
            ServiceCategorySeeder::class,
            ServiceSeeder::class,
            ServiceFeatureSeeder::class,
            FleetSeeder::class,
            FaqSeeder::class,
            ServiceAreaSeeder::class,
            SeoMetaSeeder::class,
            TestimonialSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            TeamMemberSeeder::class,
            CertificateSeeder::class,
            CompanyTimelineSeeder::class,
        ]);
    }
}
