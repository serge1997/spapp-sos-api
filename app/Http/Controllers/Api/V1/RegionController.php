<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Main\Region\Actions\RegionCreate;
use App\Main\Region\Actions\RegionList;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class RegionController extends Controller
{
    public function __construct(private ContainerInterface $container)
    {}

    public function store(RegionRequest $request)
    {
        try{
            /** @var RegionCreate $region */
            $region = $this->container->get(RegionCreate::class);
            $data = $region->run($request);
            $response = [
                "message" => "Region enregistré avec succès",
                "data" => $data,
                "status" => "success"
            ];
            return response()
                ->json($response);
        }catch(\Exception $e){
            return response()
                ->json(["message" => "ERROR: {$e->getMessage()}", "status" => "Error"], 500);
        }
    }

    public function index()
    {
        try{
            /** @var RegionList $region */
            $region = $this->container->get(RegionList::class);
            $data = $region->listAll();
            $response = [
                "message" => "List de toutes les regions",
                "data" => $data,
                "status" => "success"
            ];
            return response()
                ->json($response);
        }catch(\Exception $e){
            return response()
                ->json(["message" => "ERROR: {$e->getMessage()}", "status" => "Error"], 500);
        }
    }

    public function show(int $id)
    {
        try{
            /** @var RegionList $region */
            $region = $this->container->get(RegionList::class);
            $data = $region->find($id);
            $response = [
                "message" => "List une région",
                "data" => $data,
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
