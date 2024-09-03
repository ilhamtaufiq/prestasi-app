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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_prestasi');
            $table->string('kategori_prestasi', 25);
            $table->bigInteger('id_siswa')->unsigned();
            $table->bigInteger('id_akademik')->unsigned();
            $table->bigInteger('id_non_akademik')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_akademik')->references('id')->on('akademiks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_non_akademik')->references('id')->on('non_akademiks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
