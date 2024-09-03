<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;
    protected $table='siswas';

    protected $fillable = [

        'nama_siswa',
        'nis',
        'ttl',
        'jenis_kelamin',
        'agama',
        'pendik_sebelumnya',
        'jmlh_sodara',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'wali_siswa',
        'kelas',
        'jenis_kelamin',
        'tahun_pelajaran',
        'id_wali_kelas',
    ];

    public function walikelas(): BelongsTo
    {
        return $this->belongsTo(WaliKelas::class, 'id_wali_kelas');
    }

    // public function mapel()
    // {
    //     return $this->hasMany(MataPelajaran::class);
    // }
    /**
     * Get all of the comments for the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rapot()
    {
        return $this->hasMany(Rapot::class, 'id_siswa', 'id');
    }

    public function akademik()
    {
        return $this->hasOne(Akademik::class, 'id_siswa', 'id');
    }
}
