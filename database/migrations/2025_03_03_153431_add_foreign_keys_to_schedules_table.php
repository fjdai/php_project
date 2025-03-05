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
        Schema::table('schedules', function (Blueprint $table) {
            $table->uuid('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');

            $table->uuid('supporter_id')->nullable();
            $table->foreign('supporter_id')->references('id')->on('users')->onDelete('set null');

            $table->foreignId('status_id')->constrained('status_histories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropColumn('doctor_id');

            $table->dropForeign(['supporter_id']);
            $table->dropColumn('supporter_id');

            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
        });
    }
};
