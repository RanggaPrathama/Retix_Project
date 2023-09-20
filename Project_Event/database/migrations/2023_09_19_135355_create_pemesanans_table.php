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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->unsignedBigInteger('id_detilEvent');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                    ->references('id_user')
                    ->on('users')
                    ->onDelete('cascade');
            $table->foreign('id_detilEvent')
                    ->references('id_detilEvent')
                    ->on('detil_events')
                    ->onDelete('cascade');
            $table->date('tgl_pemesanan');
            $table->boolean('status_pemesanan')->default('0');
            $table->bigInteger('total_tagihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
