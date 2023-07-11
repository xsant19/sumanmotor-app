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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_order');
            $table->string('no_antri', 30);
            $table->date('tanggal_order');
            $table->text('kendala');
            $table->enum('status_order', ['menunggu', 'terkonfirmasi', 'sedang diproses', 'selesai'])->default('menunggu');
            $table->double('total_harga', 12)->default(0);
            $table->unsignedBigInteger('motor_id');
            $table->unsignedBigInteger('montir_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Mendifinisikan Relasi pada database
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('motor_id')->references('id')->on('motors');
            $table->foreign('montir_id')->references('id')->on('montirs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
