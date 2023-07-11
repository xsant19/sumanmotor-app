<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_order',
        'no_antri',
        'tanggal_order',
        'status_order',
        'kendala',
        'total_harga',
        'user_id',
    ];
    public function motor(): BelongsTo
    {
        return $this->belongsTo(Motor::class);
    }
}
