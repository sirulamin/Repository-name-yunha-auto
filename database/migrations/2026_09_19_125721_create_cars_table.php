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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->foreignId('brand_id')
                  ->constrained('brands')
                  ->onDelete('cascade');

            $table->string('name', 150);
            $table->year('year');
            $table->decimal('price', 15, 2);
            $table->unsignedInteger('mileage');

            $table->enum('transmission', ['Manual', 'Automatic']);
            $table->enum('fuel', ['Bensin', 'Diesel', 'Hybrid', 'Electric']);

            $table->string('color', 50);

            $table->enum('condition', ['Baru', 'Bekas']);

            $table->text('description')->nullable();

            $table->enum('status', ['Available', 'Booked', 'Sold'])
                  ->default('Available');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};