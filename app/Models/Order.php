<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_order',
        'tanggal_order',
        'status_order',
        'kendala',
        'total_harga',
        'user_id',
    ];
}
