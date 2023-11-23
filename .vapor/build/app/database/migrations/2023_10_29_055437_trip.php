<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_name');
            $table->date('trip_start_date');
            $table->date('trip_end_date');
            $table->string('trip_location');
            $table->json('trip_data')->nullable();
            $table->text('budget');
            $table->timestamps();
            $table->enum('status', ['requested', 'confirmed', 'completed', 'cancelled'])->default('requested');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
