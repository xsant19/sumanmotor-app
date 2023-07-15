<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function montir(): BelongsTo
    {
        return $this->belongsTo(Montir::class);
    }
    
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
