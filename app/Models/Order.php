<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    /** @use HasFactory<OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'address',
        'package_id',
        'status',
        'notes',
    ];

    /**
     * Get the package that was ordered.
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
