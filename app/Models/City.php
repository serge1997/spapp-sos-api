<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;

    protected $table = "cities";
    protected $fillable = [
        'id',
        'name',
        'district',
        'region_id',
        'longitude',
        'latitude',
        'population',
        'origin'
    ];

    public function region() : BelongsTo
    {
        return $this->belongsTo(Region::class);
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

    public function neighborhoods() : BelongsToMany
    {
        return $this->belongsToMany(Neighbourhood::class, 'municipalities', 'city_id', 'municipality_id');
    }
}
