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
    Schema::create('non_akademiks', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('id_siswa')->unsigned();
        $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
        $table->date('tanggal');
        $table->string('kategori_lomba', 25);
        $table->string('juara_lomba', 15);
        $table->string('tingkat_lomba', 15);
        $table->string('dokumentasi', 255);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_akademiks');
    }
};
