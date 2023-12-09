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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku')->unique();
            $table->string('judul');
            $table->unsignedBigInteger('auth_id')->nullable();
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->foreign('auth_id')->references('id')->on('authors');
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
