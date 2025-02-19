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
        Schema::table('notices', function (Blueprint $table) {
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('thana_id')->nullable();
            $table->unsignedBigInteger('union_id')->nullable();
            $table->unsignedBigInteger('stand_id')->nullable();



            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('thana_id')->references('id')->on('thanas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('union_id')->references('id')->on('unions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('stand_id')->references('id')->on('stands')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notices', function (Blueprint $table) {
            $table->dropForeign(['division_id']);
            $table->dropForeign(['district_id']);
            $table->dropForeign(['thana_id']);
            $table->dropForeign(['union_id']);
            $table->dropForeign(['stand_id']);
        });
    }
};
