<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kandang;
use App\Models\Ulasan;

class Peternak extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'photo',
        'address',
        'rating',
        'description',
        'dokumentasi',
    ];

    public function kandangs()
    {
        return $this->hasMany(Kandang::class);
    }

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }
}
