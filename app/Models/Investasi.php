<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kandang;
use App\Models\Pembayaran;

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

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kandang() 
    {
        return $this->belongsTo(Kandang::class, 'kandang_id');
    }

    public function pembayaran() 
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id');
    }
}
