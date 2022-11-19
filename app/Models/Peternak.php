<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kandang;

class Peternak extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'address',
        'rating',
        'description',
        'dokumentasi',
    ];

    public function kandangs()
    {
        return $this->hasMany(Comment::class);
    }
}
