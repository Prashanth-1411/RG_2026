<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('designation')->nullable();
            $table->string('category')->nullable();
            $table->text('content');
            $table->tinyInteger('rating')->default(5);
            $table->string('image')->nullable();
            $table->string('verification_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_approved')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
