<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Investasi;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank',
        'rekening',
    ];
    
    public function investasis()
    {
        return $this->hasMany(Investasi::class);
    }
}
