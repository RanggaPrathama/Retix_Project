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
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                    ->references('id_user')
                    ->on('users')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('id_payments')->nullable();
            $table->foreign('id_payments')->references('id_payments')->on('payments')->onDelete('cascade');
            $table->date('tgl_pemesanan');
            $table->boolean('status_pemesanan')->default('0');
            $table->string('slug',100)->unique();
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
