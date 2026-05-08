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
    Schema::create('environmental_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('node_id')->constrained('nodes')->onDelete('cascade');
        $table->float('temperature')->nullable();
        $table->float('smoke_level')->nullable();
        $table->float('water_level')->nullable();
        $table->enum('status', ['SAFE', 'WARNING', 'CRITICAL'])->default('SAFE');
        $table->string('hazard_type')->nullable();
        $table->boolean('alert_dispatched')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('environmental_logs');
    }
};
