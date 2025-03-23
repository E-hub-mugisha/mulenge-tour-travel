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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained('tours')->onDelete('cascade'); // Relates review to a tour
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relates review to a user
            $table->text('message');
            $table->integer('location_rating')->default(0);
            $table->integer('price_rating')->default(0);
            $table->integer('amenities_rating')->default(0);
            $table->integer('rooms_rating')->default(0);
            $table->integer('services_rating')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
