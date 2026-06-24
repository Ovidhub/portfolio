<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'socials' => 'array',
    ];

    /**
     * Return the single settings row, creating defaults if none exists.
     */
    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }
}
