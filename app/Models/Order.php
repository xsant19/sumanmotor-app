<?php

namespace App\Models;

use App\Events\OrderUpdated;
use App\Events\ServiceReminderEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'no_order',
        'no_antri',
        'tanggal_order',
        'status_order',
        'kendala',
        'total_harga',
        'user_id',
    ];

    protected $dispatchesEvents = [
        'updated' => OrderUpdated::class
    ];



    public function motor(): BelongsTo
    {
        return $this->belongsTo(Motor::class)->withTrashed();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
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
