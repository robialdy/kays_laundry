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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('slug')->unique();
            $table->string('no_hp', 15);
            $table->string('kota');
            $table->string('alamat_lengkap');
            $table->enum('role', ['OC', 'PC', 'C', 'D','K']);
            $table->string('username')->unique();
            $table->foreignId('id_cabang')->constrained('cabang')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status')->default('Offline');
            $table->string('password', 350);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
