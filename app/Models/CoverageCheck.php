<?php

namespace App\Models;

use Database\Factories\CoverageCheckFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverageCheck extends Model
{
    /** @use HasFactory<CoverageCheckFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'latitude',
        'longitude',
        'is_covered',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_covered' => 'boolean',
        ];
    }
}
