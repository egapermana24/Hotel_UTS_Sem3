<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginap extends Model
{
    use HasFactory;

    protected $table = 'penginap';

    protected $primaryKey = 'id_penginap';

    protected $fillable = [
        'tgl_masuk',
        'tgl_keluar',
        'lama_inap',
        'nm_penginap',
        'kd_kamar',
        'jumlah',
        'diskon',
        'pajak',
        'total',
    ];
}
