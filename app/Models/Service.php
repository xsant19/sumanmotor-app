<?php

namespace App\Models;

use App\Events\ServiceCreated;
use App\Events\ServiceDeleted;
use App\Events\ServiceUpdated;
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

    protected $dispatchesEvents = [
        'created' => ServiceCreated::class,
        'updated' => ServiceUpdated::class,
        'deleted' => ServiceDeleted::class
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
