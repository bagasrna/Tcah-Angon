<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peternak;

class Kandang extends Model
{
    use HasFactory;

    protected $fillable = [
        'peternak_id',
        'name',
        'bagi_hasil',
        'potensi_roi',
        'status',
        'harga',
        'paket'
    ];

    public function peternak() 
    {
        return $this->belongsTo(Peternak::class, 'peternak_id');
    }
}
