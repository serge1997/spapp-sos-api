<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sector extends Model
{
    use HasFactory;

    protected $table = "sectors";
    protected $fillable = [
        'id',
        'name',
        'municipality_id',
        'neighbourhood_id',
        'is_risked',
        'latitude',
        'longitude'
    ];

    public function municipality() : BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }
    public function neighbourhood() : BelongsTo
    {
        return $this->belongsTo(Neighbourhood::class);
    }
}
