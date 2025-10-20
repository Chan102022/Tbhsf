<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('tenant_suggestions', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('contact');
        $table->text('suggestion');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('tenant_suggestions');
    }
};
