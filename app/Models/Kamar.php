<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';

    protected $primaryKey = 'id_kamar';

    protected $fillable = [
        'kd_kamar',
        'no_kamar',
        'jenis',
        'fasilitas',
        'harga',
        'stok',
        'foto',
    ];
}
