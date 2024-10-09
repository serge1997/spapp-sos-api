<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Main\City\Actions\CityCreate;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class CityController extends Controller
{
    public function __construct(
        private ContainerInterface $container
    )
    {}

    public function onCreate(CityRequest $request)
    {
        try{
            /** @var CityCreate $city */
            $request->validated();
            $city = $this->container->get(CityCreate::class);
            $data = $city->run($request);
            $response = [
                "data" => $data,
                "message" => "Ville enregistrée avec succes",
                "status" => "success"
            ];
            return response()
                ->json($response);
        }catch(\Exception $e){
            return response()
                ->json(["message" => "ERROR: {$e->getMessage()}", "status" => "Error"], 500);
        }
    }
}
