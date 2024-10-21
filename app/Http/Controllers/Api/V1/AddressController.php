<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Main\Address\Actions\AddressCreate;
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
            /** @var AddressCreate $addressCreate */
            $addressCreate = $this->container->get(AddressCreate::class);
            $addressCreate->run($request);

            return response()
                ->json($this->successResponse("address creé avec success"));
        }catch(\Exception $e){
            return response()
                ->json($this->errorResponse("ERROR: {$e->getMessage()} {$e->getFile()} {$e->getLine()}"), 500);
        }
    }
}
