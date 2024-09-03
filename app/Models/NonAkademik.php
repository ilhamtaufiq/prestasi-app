<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NonAkademik extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_siswa",
        "tanggal",
        "kategori_lomba",
        "juara_lomba",
        "tingkat_lomba",
        "dokumentasi",
    ];
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
  
}