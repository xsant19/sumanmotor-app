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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_service', 30);
            $table->double('harga_service', 12);
            $table->text('deskripsi', 30);
            $table->unsignedBigInteger('order_id');
            $table->timestamps();

            // Mendifinisikan Relasi pada database
            // $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('services');
    }
};
