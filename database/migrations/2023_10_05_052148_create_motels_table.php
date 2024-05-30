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
        Schema::create('motels', function (Blueprint $table) {
            $table->id();
            $table->string('room_number');
            $table->string('room_site');
            $table->enum('room_type', ['standard', 'luxury', 'superior']);
            $table->integer('price');
            $table->text('image_url');
            $table->text('details');
            $table->longText('description');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('status', ['available', 'reserved', 'occupied']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motels');
    }
};
