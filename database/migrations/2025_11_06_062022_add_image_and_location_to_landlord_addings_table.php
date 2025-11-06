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
    Schema::table('landlord_addings', function (Blueprint $table) {
        $table->string('image')->nullable()->after('adding_date');
        $table->decimal('latitude', 10, 7)->nullable()->after('image');
        $table->decimal('longitude', 10, 7)->nullable()->after('latitude');
    });
}

public function down(): void
{
    Schema::table('landlord_addings', function (Blueprint $table) {
        $table->dropColumn(['image', 'latitude', 'longitude']);
    });
}

};
