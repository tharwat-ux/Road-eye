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
        Schema::create('radars', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->foreignId('traffic_id')->nullable()
            ->constrained('traffics');
            $table->string('image');
            $table->float('width')->nullable();
            $table->float('lenght')->nullable();
            $table->float('max_speed')->default(70);
            $table->float('congestion_rate')->default(.5);
            $table->boolean('is_violation')->default(1);
            $table->boolean('is_accident')->default(1);
            $table->boolean('is_crime_cars')->default(1);
        });
         DB::statement('ALTER TABLE radars ADD top_right POINT NULL');
         DB::statement('ALTER TABLE radars ADD top_left POINT NULL');
         DB::statement('ALTER TABLE radars ADD bottom_right POINT NULL');
         DB::statement('ALTER TABLE radars ADD bottom_left POINT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radars');
    }
};
