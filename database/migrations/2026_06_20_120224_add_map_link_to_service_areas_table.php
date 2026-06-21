<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_areas', function (Blueprint $table) {
            $table->text('description')->nullable()->after('region');
            $table->text('map_link')->nullable()->after('description');
            $table->string('icon')->nullable()->after('map_link');
        });
    }

    public function down(): void
    {
        Schema::table('service_areas', function (Blueprint $table) {
            $table->dropColumn(['description', 'map_link', 'icon']);
        });
    }
};
