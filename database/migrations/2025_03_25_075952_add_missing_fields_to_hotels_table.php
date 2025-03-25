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
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('address')->nullable()->after('location');  // Adding address
            $table->decimal('rating', 2, 1)->default(0)->after('description');  // Rating for the hotel
            $table->text('amenities')->nullable()->after('rating');  // List of amenities
            // Adding rooms columns if they don't exist
            if (!Schema::hasColumn('hotels', 'total_rooms')) {
                $table->integer('total_rooms')->default(0)->after('amenities');  // Total rooms
            }

            if (!Schema::hasColumn('hotels', 'available_rooms')) {
                $table->integer('available_rooms')->default(0)->after('total_rooms');  // Rooms available
            }
            $table->time('check_in_time')->nullable()->after('location');  // Check-in time
            $table->time('check_out_time')->nullable()->after('check_in_time');  // Check-out time
            $table->string('hotel_type')->nullable()->after('images');  // Hotel type (Resort, Motel, etc.)
            $table->string('status')->default('active')->after('hotel_type');  // Status (active, inactive)
            $table->string('contact_number')->nullable()->after('status');  // Contact number
            $table->string('email')->nullable()->after('contact_number');  // Contact email
            $table->string('website')->nullable()->after('email');  // Website URL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            // Drop the added fields in case of rollback
            $table->dropColumn([
                'address',
                'rating',
                'amenities',
                'available_rooms',
                'total_rooms',
                'check_in_time',
                'check_out_time',
                'hotel_type',
                'status',
                'contact_number',
                'email',
                'website',
            ]);
        });
    }
};
