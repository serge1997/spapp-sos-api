<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MunicipalityRequest;
use App\Main\Municipality\Actions\MunicipalityCreate;
use App\Main\Municipality\Actions\MunicipalityList;
use App\Main\Municipality\Repository\MunicipalityRepositoryInterface;
use App\Traits\HttpResponse;
use Exception;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class MunicipalityController extends Controller
{
    use HttpResponse;

    public function __construct(
        private ContainerInterface $container
    ){}


    public function onCreate(MunicipalityRequest $request)
    {
        try{
            /** @var MuncipalityCreate $municpalityCreate */
            $request->validated();
            $message = "La commune enregistré avec succes";
            $municpalityCreate = $this->container->get(MunicipalityCreate::class);
            $municipality = $municpalityCreate->create($request);
            return response()
                ->json($this->successResponse($message, $municipality));
        }catch(Exception $e){
            return response()
                ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
        }
    }

    public function onListAll()
    {
        try{
            /** @var MuncipalityList $municpalityList */
            $message = "Liste de toutes les communes";
            $municpalityList = $this->container->get(MunicipalityList::class);
            $municipalities = $municpalityList->listAll();
            return response()
                ->json($this->successResponse($message, $municipalities));
        }catch(Exception $e){
            return response()
                ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
        }
    }
}