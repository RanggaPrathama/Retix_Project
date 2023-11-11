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
        Schema::create('detil_events', function (Blueprint $table) {
            $table->id('id_detilEvent');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_event');
            $table->foreign('id_event')
                    ->references('id_event')
                    ->on('events')
                    ->onDelete('cascade');
            $table->foreign('id_kategori')
                    ->references('id_kategori')
                    ->on('kategoris')
                    ->onDelete('cascade');
            $table->integer('kuota_event');
            $table->bigInteger('harga_event');
            $table->string('slug',100)->unique();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detil_events');
    }
};
