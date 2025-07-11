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
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('car_plate');
            $table->string('image');
            $table->foreignId('radar_id')
            ->constrained('radars');
            $table->float('fees');
            $table->boolean('is_reviewed')->default(0);
            $table->timestamps()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
