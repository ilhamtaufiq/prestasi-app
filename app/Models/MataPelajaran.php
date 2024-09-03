<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    // use HasFactory;

    protected $table='mapels';

    protected $fillable = [

        'pai',
        'pkn',
        'indo',
        'mtk',
        'ipa',
        'ips',
        'pjok',
        'senbud',
        'sunda',
    ];

// /**
//  * Get the user that owns the MataPelajaran
//  *
//  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
//  */
// public function rapot()
// {
//     return $this->belongsTo(Rapot::class, 'id_mapel', 'id');
// }
}
