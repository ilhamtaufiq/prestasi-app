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
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mapel');
            // hapus
            // $table->string('pkn');
            // $table->string('indo');
            // $table->string('mtk');
            // $table->string('ipa');
            // $table->string('ips');
            // $table->string('pjok');
            // $table->string('senbud');
            // $table->string('sunda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapels');
    }
};
