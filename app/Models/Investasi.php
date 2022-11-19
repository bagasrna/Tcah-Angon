<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kandang_id',
        'pembayaran_id',
        'jumlah_unit',
        'total_harga',
        'bukti_pembayaran',
    ];
}
