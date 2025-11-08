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
        if (!Schema::hasColumn('tenant_bookings', 'email')) {
            $table->string('email')->nullable();
        }
        if (!Schema::hasColumn('tenant_bookings', 'contact')) {
            $table->string('contact')->nullable();
        }
        if (!Schema::hasColumn('tenant_bookings', 'address')) {
            $table->string('address')->nullable();
        }
        if (!Schema::hasColumn('tenant_bookings', 'room')) {
            $table->string('room')->nullable();
        }
        if (!Schema::hasColumn('tenant_bookings', 'status')) {
            $table->string('status')->nullable();
        }
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
