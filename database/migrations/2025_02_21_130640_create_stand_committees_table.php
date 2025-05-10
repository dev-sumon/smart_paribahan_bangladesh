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
        Schema::create('stand_committees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('division_id')->nullable();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('thana_id')->nullable();
            $table->foreign('thana_id')->references('id')->on('thanas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('union_id')->nullable();
            $table->foreign('union_id')->references('id')->on('unions')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('stand_id')->nullable();
            $table->foreign('stand_id')->references('id')->on('stands')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stand_committees');
    }
};
