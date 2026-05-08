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
        Schema::create('settings', function (Blueprint $table) {
            $id = $table->id();
            $table->string('key')->unique();
            $table->string('value');
            $table->timestamps();
        });

        // Initialize with your current hardcoded values
        DB::table('settings')->insert([
            ['key' => 'temp_critical', 'value' => '45'],
            ['key' => 'temp_warning', 'value' => '35'],
            ['key' => 'smoke_critical', 'value' => '15'],
            ['key' => 'water_critical', 'value' => '10'],
            ['key' => 'polling_rate', 'value' => '2'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
