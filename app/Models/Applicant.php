<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Applicant extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'id',
        'fullname',
        'email',
        'username',
        'password',
        'cni_number',
        'attestation_number',
        'phone',
        'address_id',
        'address_number',
        'address_complement',
        'is_wanted',
        'is_activated_account',
        'is_access_blocked',
        'account_activation_key'
    ];

    public function password() : Attribute
    {
        return Attribute::make(
            set: fn(string $value) => Hash::make($value)
        );
    }

    public function complains() : HasMany
    {
        return $this->hasMany(Complain::class, 'applicant_id');
    }

    public function hasAccessBlocked() : bool
    {
        return $this->is_access_blocked === true;
    }

    public function isWanted() : bool
    {
        return $this->is_wanted === true;
    }

    public function hasAccountActivationKey() : bool
    {
        return !is_null($this->account_activation_key);
    }
}
