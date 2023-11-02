<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('page_types');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('content_centered')->default(0);
            $table->boolean('has_map')->default(0);
            $table->string('map_lat')->nullable();
            $table->string('map_lng')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
