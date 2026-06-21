<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('footer_text')->nullable()->after('iso_certified');
            $table->text('footer_description')->nullable()->after('footer_text');
            $table->string('meta_keywords')->nullable()->after('footer_description');
            $table->text('meta_description')->nullable()->after('meta_keywords');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['footer_text', 'footer_description', 'meta_keywords', 'meta_description']);
        });
    }
};
