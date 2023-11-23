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
        Schema::create('events', function (Blueprint $table) {
            $table->id('id_event');
            $table->unsignedBigInteger('id_kecamatan');
            $table->foreign('id_kecamatan')
                    ->references('id_kecamatan')
                    ->on('kecamatans')
                    ->onDelete('cascade');
            $table->string('slug',100)->unique();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('nama_lokasi');
            $table->string('nama_event');
            $table->string('gambar_event');
            $table->datetime('tgl_event');
            $table->datetime('tgl_akhir_event');
            $table->string('deskripsi_event');
            $table->string('maps')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
