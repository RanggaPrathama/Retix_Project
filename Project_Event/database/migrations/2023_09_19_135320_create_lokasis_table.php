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
        Schema::create('lokasis', function (Blueprint $table) {
            $table->id('id_lokasi');
            $table->unsignedBigInteger('id_kecamatan');
            $table->foreign('id_kecamatan')
                    ->references('id_kecamatan')
                    ->on('kecamatans')
                    ->onDelete('cascade');
            $table->string('nama_lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
