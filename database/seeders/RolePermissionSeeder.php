<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'view_dashboard', 'view_analytics',

            // Content
            'manage_pages', 'manage_hero_slides', 'manage_services', 'manage_fleet',
            'manage_equipment_rentals', 'manage_mortuary', 'manage_testimonials',
            'manage_blog', 'manage_gallery', 'manage_team', 'manage_capabilities',
            'manage_sister_concerns', 'manage_certificates', 'manage_faq',
            'manage_statistics', 'manage_navigation',

            // Media
            'manage_media_library',

            // SEO
            'manage_seo',

            // Design
            'manage_theme', 'manage_animations',

            // Contact
            'manage_contact_info', 'view_inquiries', 'view_bookings',

            // System
            'manage_settings', 'manage_roles', 'manage_users',
            'view_activity_logs', 'manage_backups',
        ];

        foreach ($permissions as $perm) {
            Permission::findOrCreate($perm);
        }

        $superAdmin = Role::findOrCreate('Super Admin');
        $superAdmin->syncPermissions(Permission::all());

        $admin = Role::findOrCreate('Admin');
        $admin->syncPermissions(Permission::all()->pluck('name')->reject(fn($n) => in_array($n, [
            'manage_roles', 'manage_users', 'manage_backups', 'view_activity_logs',
        ]))->toArray());

        $contentManager = Role::findOrCreate('Content Manager');
        $contentManager->syncPermissions([
            'manage_pages', 'manage_hero_slides', 'manage_services', 'manage_fleet',
            'manage_equipment_rentals', 'manage_mortuary', 'manage_testimonials',
            'manage_blog', 'manage_gallery', 'manage_team', 'manage_capabilities',
            'manage_sister_concerns', 'manage_certificates', 'manage_faq',
            'manage_statistics', 'manage_navigation', 'manage_media_library', 'manage_seo',
        ]);

        $marketingManager = Role::findOrCreate('Marketing Manager');
        $marketingManager->syncPermissions([
            'manage_testimonials', 'manage_blog', 'manage_gallery',
            'manage_media_library', 'manage_seo', 'manage_animations',
            'view_analytics',
        ]);

        $user = User::firstOrCreate(
            ['email' => 'admin@rgambulanceservice.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password'),
            ]
        );
        $user->assignRole('Super Admin');
    }
}
