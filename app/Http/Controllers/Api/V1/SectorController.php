<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectorRequest;
use App\Main\Sector\Actions\SectorCreate;
use App\Main\Sector\Actions\SectorList;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class SectorController extends Controller
{
    use HttpResponse;
    public function __construct(
        private ContainerInterface $container
    )
    {}

    public function listByMunicpality($municipality_id)
    {
       try{
            /** @var SectorList $sectorList */
            $sectorList = $this->container->get(SectorList::class);
            $sectors = $sectorList->findAllByMunicpality($municipality_id);
            $message = "list de tous les secteurs d'une comune";
            return response()
                ->json($this->successResponse($message,$sectors));
       }catch(\Exception $e){
            return response()
                ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
       }
    }

    public function store(SectorRequest $request): \Illuminate\Http\JsonResponse
    {
        try{
            /** @var SectorCreate $sectorCreate */
            $sectorCreate = $this->container->get(SectorCreate::class);
            $data = $sectorCreate->run($request);
            $message = "Secteur enregistré avec succes";
            return response()
                ->json($this->successResponse($message, $data));
        }catch(\Exception $e){
            return response()
                ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
        }
    }
    public function show(int $id)
    {
        try{
            /** @var SectorList $sectorList */
            $sectorList = $this->container->get(SectorList::class);
            $sector = $sectorList->findById($id);
            $message = "list d'un secteur'";
            return response()
                ->json($this->successResponse($message,$sector));
       }catch(\Exception $e){
            return response()
                ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
       }
    }
}
