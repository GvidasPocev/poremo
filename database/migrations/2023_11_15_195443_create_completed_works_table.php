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
        Schema::create('completed_works', function (Blueprint $table) {
            $table->id();
            $table->string('structure_name');
            $table->string('client');
            $table->text('tasks_completed');
            $table->string('cover_image')->nullable();
            $table->text('inner_image')->nullable();
            $table->string('inner_main_image')->nullable();
            $table->date('started');
            $table->date('finished')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('completed_works');
    }
};
