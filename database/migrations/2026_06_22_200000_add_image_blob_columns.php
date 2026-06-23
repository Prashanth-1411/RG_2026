<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $tables = [
        'hero_slides' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
        'settings' => [
            ['from' => 'logo', 'blob' => 'logo_blob', 'mime' => 'logo_mime'],
            ['from' => 'favicon', 'blob' => 'favicon_blob', 'mime' => 'favicon_mime'],
        ],
        'gallery_images' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
        'albums' => [
            ['from' => 'cover_image', 'blob' => 'cover_image_blob', 'mime' => 'cover_image_mime'],
        ],
        'testimonials' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
        'team_members' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
        'certificates' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
        'blog_posts' => [
            ['from' => 'featured_image', 'blob' => 'featured_image_blob', 'mime' => 'featured_image_mime'],
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
        'capabilities' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
            ['from' => 'icon', 'blob' => 'icon_blob', 'mime' => 'icon_mime'],
        ],
        'sister_concerns' => [
            ['from' => 'logo', 'blob' => 'logo_blob', 'mime' => 'logo_mime'],
        ],
        'pages' => [
            ['from' => 'hero_image', 'blob' => 'hero_image_blob', 'mime' => 'hero_image_mime'],
        ],
        'services' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
            ['from' => 'banner_image', 'blob' => 'banner_image_blob', 'mime' => 'banner_image_mime'],
        ],
        'funeral_services' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
            ['from' => 'banner_image', 'blob' => 'banner_image_blob', 'mime' => 'banner_image_mime'],
        ],
        'fleets' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
        'equipment_rentals' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
        'mortuaries' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
        'fleet_categories' => [
            ['from' => 'image', 'blob' => 'image_blob', 'mime' => 'image_mime'],
        ],
    ];

    public function up(): void
    {
        foreach ($this->tables as $tableName => $columns) {
            Schema::table($tableName, function (Blueprint $blueprint) use ($tableName, $columns) {
                foreach ($columns as $col) {
                    $hasExisting = Schema::hasColumn($tableName, $col['from']);
                    $colDef = $blueprint->longText($col['blob'])->nullable();
                    if ($hasExisting) {
                        $colDef->after($col['from']);
                    }
                    $mimeDef = $blueprint->string($col['mime'], 50)->nullable();
                    if ($hasExisting) {
                        $mimeDef->after($col['blob']);
                    }
                }
            });
        }
    }

    public function down(): void
    {
        foreach ($this->tables as $tableName => $columns) {
            Schema::table($tableName, function (Blueprint $blueprint) use ($columns) {
                foreach ($columns as $col) {
                    $blueprint->dropColumn([$col['blob'], $col['mime']]);
                }
            });
        }
    }
};
