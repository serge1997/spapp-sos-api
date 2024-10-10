<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
