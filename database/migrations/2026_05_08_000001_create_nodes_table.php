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
    Schema::create('nodes', function (Blueprint $table) {
        $table->id();
        $table->string('hardware_id')->unique();
        $table->string('location_name');
        $table->string('specific_area')->nullable();
        $table->string('ip_address')->nullable();
        $table->enum('status', ['ONLINE', 'OFFLINE', 'MAINTENANCE'])->default('ONLINE');
        $table->timestamp('last_ping_at')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nodes');
    }
};
