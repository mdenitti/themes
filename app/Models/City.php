<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     * This protects against mass-assignment vulnerabilities.
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'country',
        'continent',
        'population',
        'latitude',
        'longitude',
        'known_for',
        'founded_year',
        'is_capital',
        'annual_tourists'
    ];

    /**
     * The attributes that should be cast to specific types.
     * This ensures data consistency when retrieving from database.
     * 
     * @var array
     */
    protected $casts = [
        'is_capital' => 'boolean',
        'population' => 'integer',
        'annual_tourists' => 'integer',
        'founded_year' => 'integer'
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     * These fields won't appear in API responses or array conversions.
     * 
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
