<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peternak;
use App\Models\Investasi;

class Kandang extends Model
{
    use HasFactory;

    protected $fillable = [
        'peternak_id',
        'name',
        'bagi_hasil',
        'potensi_roi',
        'unit_tersedia',
        'status',
        'harga',
        'paket',
        'proposal',
        'dibutuhkan',
        'terkumpul',
        'durasi',
        'berat_awal',
        'estimasi',
        'berat_akhir',
        'persentase',
        'berat',
        'kesehatan',
        'pakan',
    ];

    public function peternak() 
    {
        return $this->belongsTo(Peternak::class, 'peternak_id');
    }

    public function investasis()
    {
        return $this->hasMany(Investasi::class);
    }
}
