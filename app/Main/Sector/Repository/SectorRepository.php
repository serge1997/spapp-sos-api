<?php
namespace App\Main\Sector\Repository;

use App\Models\Sector;
use App\Models\Municipality;
use App\Models\Neighbourhood;
use App\Models\City;

class SectorRepository implements SectorRepositoryInterface
{
    public function create(array $data) : Sector
    {
        return Sector::create($data);
    }

    public function listAllByMunicipality(Municipality $municipality)
    {
        return Sector::where('municipality_id', $municipality->id)->get();
    }
    public function find(int $id) : Sector
    {
        return Sector::find($id);
    }

    public function findOrCreate($request, Neighbourhood $neighbourhood, ?Municipality $municipality = null, ?City $city = null)
    {
        $find = $this->findByNameAndNeighbourhoodAndMunicipality($request->sector, $neighbourhood, $municipality);
        if (empty($sector)){
            $sector = new Sector();
            $sector->name = $request->sector;
            $sector->neighbourhood_id = $neighbourhood->id;
            $sector->municipality_id = $municipality->id;
            $sector->latitude = $request->latitude;
            $sector->longitude = $request->longitude;
            $sector->save();
            return $sector;
        }
        return $find;

    }
    public function findByNameAndNeighbourhoodAndMunicipality(string $name,Neighbourhood $neighbourhood, Municipality $municipality)
    {
        return Sector::where([
            ['name', $name],
            ['neighbourhood_id', $neighbourhood->id],
            ['municipality_id', $municipality->id]
        ])->first();
    }
}
