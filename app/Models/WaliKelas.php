<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class WaliKelas extends Model
{
    use HasFactory;
    protected $table='wali_kelass';
    
    protected $fillable = [
        'nip',
        'nama_guru',
        'jabatan',
        'jenis_kelamin',
        'id_user'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
