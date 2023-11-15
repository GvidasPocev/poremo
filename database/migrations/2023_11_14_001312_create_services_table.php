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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->text('inner_image')->nullable();
            $table->string('inner_main_image')->nullable();
            $table->boolean('show_in_index')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
