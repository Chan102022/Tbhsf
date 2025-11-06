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
        Schema::create('tenant_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // optional: tenant's user ID
            $table->string('name');
            $table->string('contact');
            $table->date('booking_date');
            $table->string('image')->nullable();        // optional uploaded image
            $table->decimal('latitude', 10, 7)->nullable();  // map latitude
            $table->decimal('longitude', 10, 7)->nullable(); // map longitude
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_bookings');
    }
};
