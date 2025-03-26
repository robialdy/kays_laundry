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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_paket')->constrained('paket')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_pelaksana_cabang')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_order')->nullable();
            $table->dateTime('tanggal_order')->nullable();
            $table->string('status')->nullable();
            $table->string('bukti_selesai')->nullable();
            $table->dateTime('tanggal_selesai')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('type', ['Online','Offline']);
            $table->string('nama_off')->nullable();
            $table->string('no_hp_off', 15)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
