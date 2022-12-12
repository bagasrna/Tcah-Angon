<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Investasi;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'peternak_id',
        'bank',
        'rekening',
    ];
    
    public function investasis()
    {
        return $this->hasMany(Investasi::class);
    }

    public function peternak() 
    {
        return $this->belongsTo(Peternak::class, 'peternak_id');
    }
}
