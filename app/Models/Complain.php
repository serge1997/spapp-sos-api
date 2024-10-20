<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;
    protected $table = "complains";

    protected $fillable = [
        'id',
        'description',
        'applicant_id',
        'address_id',
        'address_number',
        'address_complement',
        'complain_type_id'
    ];
}
