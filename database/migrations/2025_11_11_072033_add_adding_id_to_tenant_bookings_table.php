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
            $table->foreignId('adding_id')
                  ->constrained('landlord_addings')
                  ->onDelete('cascade')
                  ->after('id'); // optional, just to position it after id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenant_bookings', function (Blueprint $table) {
            $table->dropForeign(['adding_id']);
            $table->dropColumn('adding_id');
        });
    }
};
