<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('phone');
            $table->string('twitter')->nullable()->after('facebook');
            $table->string('linkedin')->nullable()->after('twitter');
            $table->string('instagram')->nullable()->after('linkedin');
            $table->text('description')->nullable()->after('bio');
        });
    }

    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn(['facebook', 'twitter', 'linkedin', 'instagram', 'description']);
        });
    }
};
