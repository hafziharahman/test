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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('isi_komentar');
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_gambar');
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('id_gambar')->references('id')->on('images')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
