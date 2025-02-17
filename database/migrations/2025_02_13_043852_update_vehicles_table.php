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
        Schema::table('vehicles', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_type_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();



            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign(['vehicle_type_id']);
            $table->dropForeign(['owner_id']);
            $table->dropForeign(['driver_id']);
        });
    }
};
