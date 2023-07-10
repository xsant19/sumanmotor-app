<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'merk_motor',
        'jenis_motor',
        'no_polisi',
        'user_id',
    ];
}
