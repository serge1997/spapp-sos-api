<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Municipality extends Model
{
    use HasFactory;

    protected $table = "municipalities";
    protected $fillable = [
        'id',
        'name',
        'city_id',
        'longitude',
        'latitude',
        'population',
        'origin'
    ];

    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function neighbourhoods() : HasMany
    {
        return $this->hasMany(Neighbourhood::class);
    }

    public function sectors() : HasMany
    {
        return $this->hasMany(Sector::class);
    }

    public function createdAt() : Attribute
    {
        return Attribute::make(
            get: fn($value) => date('d/m/Y H:i:s', strtotime($value))
        );
    }
    public function updatedAt() : Attribute
    {
        return Attribute::make(
            get: fn($value) => $value != null ? date('d/m/Y H:i:s', strtotime($value)) : null
        );
    }
}
