<?php

namespace App\Enums\Enums;

enum CountryLocalInfoOriginEnum : string
{
    case Agent = "Agent spapp";
    case Delivery = "Delivery spapp";
    case Owner = "Owner spapp";
}
