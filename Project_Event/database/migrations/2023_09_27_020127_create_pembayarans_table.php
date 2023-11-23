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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                    ->references('id_user')->on('users')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('id_pemesanan');
            $table->foreign('id_pemesanan')
                    ->references('id_pemesanan')
                    ->on('pemesanans')
                    ->onDelete('cascade');
            $table->date('tgl_pembayaran');
            $table->boolean('status_pembayaran');
            $table->string('gambar')->nullable();
            $table->string('slug',100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
