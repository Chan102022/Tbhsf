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
    Schema::table('tenant_bookings', function (Blueprint $table) {
        $table->string('name')->nullable();
        $table->string('contact')->nullable();
        $table->unsignedBigInteger('landlord_id')->nullable();
        $table->string('landlord_name')->nullable();
        $table->string('landlord_contact')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::table('tenant_bookings', function (Blueprint $table) {
        $table->dropColumn(['name', 'contact', 'landlord_id', 'landlord_name', 'landlord_contact']);
    });
}

};
