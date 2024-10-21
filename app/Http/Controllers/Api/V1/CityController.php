<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Main\City\Actions\CityCreate;
use App\Main\City\Actions\CityList;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class CityController extends Controller
{
    use HttpResponse;

    public function __construct(
        private ContainerInterface $container
    )
    {}

    public function store(CityRequest $request)
    {
        try{
            /** @var CityCreate $city */
            $request->validated();
            $city = $this->container->get(CityCreate::class);
            $data = $city->run($request);
            $message = "Ville {$request->name()} enregistrée avec succes";
            return response()
                ->json($this->successResponse($message, $data));
        }catch(\Exception $e){
            return response()
                ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
        }
    }

    public function index()
    {
        try{
            /** @var CityList $city */
            $cities = $this->container->get(CityList::class);
            $data = $cities->listAll();
            $message = "List de toutes les villes";
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
            /** @var CityList $cityList */
            $cityList = $this->container->get(CityList::class);
            $city = $cityList->findById($id);
            return response()
                ->json($this->successResponse("donnée d'une ville", $city));
        }catch(\Exception $e){
            return response()
                ->json($this->errorResponse("ERROR: {$e->getMessage()}"), 500);
        }
    }
}
