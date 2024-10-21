<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "addresses";
    protected $fillable = [
        'id',
        'street_name',
        'city_id',
        'municipality_id',
        'neighbourhood_id',
        'sector_id',
        'zip_code'
    ];
}
