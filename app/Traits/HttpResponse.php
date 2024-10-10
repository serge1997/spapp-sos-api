<?php

namespace App\Traits;

trait HttpResponse
{

    public function errorResponse(?string $message = null, mixed $data = null) : array
    {
        return [
            "data" => $data,
            "message" => $message,
            "status" => "error"
        ];
    }

    public function successResponse(?string $message = null, mixed $data = null) : array
    {
        return [
            "data" => $data,
            "message" => $message,
            "status" => "success"
        ];
    }
}
