<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class ComplainController extends Controller
{
    public function __construct(private ContainerInterface $container)
    {}
}
