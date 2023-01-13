<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $primaryKey = 'id_reservasi';

    protected $fillable = [
        'tgl_reservasi',
        'nm_customer',
        'kd_kamar',
        'jumlah',
    ];
}
