<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Main\Region\Actions\RegionCreate;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class RegionController extends Controller
{
    public function __construct(private ContainerInterface $container)
    {}

    public function onCreate(RegionRequest $request)
    {
        try{
            /** @var RegionCreate $region */
            $region = $this->container->get(RegionCreate::class);
            $data = $region->run($request);
            $response = [
                "message" => "Region enregistré avec succès",
                "data" => $data
            ];
            return response()
                ->json($response);
        }catch(\Exception $e){
            return response()
                ->json($e->getMessage(), 500);
        }
    }
}
