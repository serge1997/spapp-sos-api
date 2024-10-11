<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

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

    public function city() : HasOneThrough
    {
        return $this->hasOneThrough(Municipality::class, City::class);
    }
}
