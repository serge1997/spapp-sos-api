<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
