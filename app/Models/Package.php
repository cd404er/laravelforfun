<?php

namespace App\Models;

use Database\Factories\PackageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    /** @use HasFactory<PackageFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'speed_mbps',
        'price',
        'description',
        'is_active',
        'features',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'features' => 'array',
            'price' => 'decimal:2',
        ];
    }

    /**
     * Get the orders for the package.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
