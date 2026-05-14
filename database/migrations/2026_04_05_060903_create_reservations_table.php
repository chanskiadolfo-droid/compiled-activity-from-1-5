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
    Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        $table->string('name');                          // Customer name
        $table->string('service_type');                  // Type of service
        $table->string('contact_number');                // Phone number
        $table->string('status')->default('Waiting');    // Queue status
        $table->integer('queue_number')->unique();        // Queue number
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
