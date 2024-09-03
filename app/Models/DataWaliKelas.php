<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataWaliKelas extends Model
{
    use HasFactory;

    protected $fillabele = [
        'nip',
        'nama_guru',
        'guru_kelas',
        'jenis_kelamin',
    ];
}
