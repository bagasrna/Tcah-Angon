<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peternak;

class Ulasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'peternak_id',
        'name',
        'bidang_ahli',
        'rating',
        'ulasan',
    ];

    public function peternak() 
    {
        return $this->belongsTo(Peternak::class, 'peternak_id');
    }
}
