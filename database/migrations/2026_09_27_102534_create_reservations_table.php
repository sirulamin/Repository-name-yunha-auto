<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('car_id')->constrained()->cascadeOnDelete();

            $table->string('reservation_code')->unique();
            $table->string('phone');
            $table->date('preferred_date')->nullable();

            $table->decimal('dp_percent', 5, 2)->default(20);
            $table->decimal('dp_amount', 15, 2)->default(0);

            $table->text('notes')->nullable();
            $table->enum('status', [
                'Pending',
                'Confirmed',
                'Cancelled',
                'Completed'
            ])->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};