<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_service',
        'deskripsi',
        'harga_service',
        'order_id',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
