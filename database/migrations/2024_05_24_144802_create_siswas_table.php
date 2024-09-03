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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa', 50);
            $table->string('nis',50);
            $table->string('ttl',50);
            $table->char('jenis_kelamin', 2);
            $table->string('agama', 10);
            $table->string('pendik_sebelumnya')->nullable();
            $table->char('jmlh_sodara', 10)->nullable();
            $table->string('alamat', 255);
            $table->string('nama_ayah', 50)->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->string('pekerjaan_ayah', 25)->nullable();
            $table->string('pekerjaan_ibu', 25)->nullable();
            $table->string('wali_siswa')->nullable();
            $table->char('kelas', 5);
            $table->integer('tahun_pelajaran');
            $table->bigInteger('id_wali_kelas')->unsigned();
            $table->foreign('id_wali_kelas')->references('id')->on('wali_kelass')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
