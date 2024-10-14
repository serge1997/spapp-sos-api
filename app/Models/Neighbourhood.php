<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Neighbourhood extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'municipality_id',
        'is_risked',
        'longitude',
        'latitude',
        'population',
        'origin'
    ];

    public function municipality() : BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }
    public function city() : BelongsTo
    {
        return $this->municipality->city();
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
