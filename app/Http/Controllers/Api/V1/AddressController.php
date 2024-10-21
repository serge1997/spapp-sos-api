<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class AddressController extends Controller
{
    use HttpResponse;

    public function __construct(private ContainerInterface $container)
    {}

    public function store(AddressRequest $request)
    {
        try{
            dd("Hey");

        }catch(\Exception $e){
            return response()
                ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
        }
    }
}
