<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->uniqid();
            $table->longText('description')->nullable();
            $table->string('designation');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('vehicles_license')->unique()->nullable();
            $table->string('image')->nullable();
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->string('created_by_guard')->nullable();
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->string('updated_by_guard')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
