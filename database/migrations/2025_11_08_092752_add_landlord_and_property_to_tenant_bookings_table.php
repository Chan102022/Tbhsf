<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tenant_bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('landlord_id')->nullable()->after('contact');
            $table->string('landlord_name')->nullable()->after('landlord_id');
            $table->string('landlord_contact')->nullable()->after('landlord_name');
            $table->string('property_name')->nullable()->after('landlord_contact');
        });
    }

    public function down(): void
    {
        Schema::table('tenant_bookings', function (Blueprint $table) {
            $table->dropColumn(['landlord_id', 'landlord_name', 'landlord_contact', 'property_name']);
        });
    }
};
