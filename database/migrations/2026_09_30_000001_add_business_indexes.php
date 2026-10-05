<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->index(['status', 'brand_id']);
            $table->index('price');
        });

        Schema::table('test_drives', function (Blueprint $table) {
            $table->index(['car_id', 'date', 'time', 'status']);
            $table->index(['user_id', 'status']);
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->index(['car_id', 'status']);
            $table->index(['user_id', 'status']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->unique('reservation_id');
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropIndex(['status', 'brand_id']);
            $table->dropIndex(['price']);
        });

        Schema::table('test_drives', function (Blueprint $table) {
            $table->dropIndex(['car_id', 'date', 'time', 'status']);
            $table->dropIndex(['user_id', 'status']);
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->dropIndex(['car_id', 'status']);
            $table->dropIndex(['user_id', 'status']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropUnique(['reservation_id']);
        });
    }
};
