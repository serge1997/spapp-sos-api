<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NeighbourhoodRequest;
use App\Main\Neighbourhood\Actions\NeighbourhoodCreate;
use App\Main\Neighbourhood\Actions\NeighbourhoodList;
use App\Traits\HttpResponse;
use Exception;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class NeighbourhoodController extends Controller
{
    use HttpResponse;

    public function __construct(
        private ContainerInterface $container
    )
    {}

    public function onCreate(NeighbourhoodRequest $request)
    {
        try{
            $request->validated();
            $message = "Quartier enregistré avec succés";
            /** @var NeighbourhoodCreate $neighbourhoodCreate */
            $neighbourhoodCreate = $this->container->get(NeighbourhoodCreate::class);
            $response = $neighbourhoodCreate->run($request);

            return response()
                ->json($this->successResponse($message, $response));
        }catch(Exception $e){
            return response()
            ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
        }
    }

    public function onListAll()
    {
        try{
            $message = "List de tous les quartiers";
            /** @var NeighbourhoodList $neighbourhoodList */
            $neighbourhoodList = $this->container->get(NeighbourhoodList::class);
            $neighbourhoods = $neighbourhoodList->listAll();
            return response()
                ->json($this->successResponse($message, $neighbourhoods));
        }catch(Exception $e){
            return response()
            ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
        }
    }
}
