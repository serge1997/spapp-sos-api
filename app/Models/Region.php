<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;
    protected $table = "regions";
    protected $fillable = [
        'id',
        'name',
        'map_position',
        'longitude',
        'latitude',
        'population'
    ];

    public function cities() : HasMany
    {
        return $this->hasMany(City::class, 'region_id');
    }
}
