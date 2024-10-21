<?php
namespace App\Main\Address\Repository;

use App\Models\City;
use App\Models\Neighbourhood;

interface AddressRepositoryInterface
{
    public function findOrCreate($request, City $city, Neighbourhood $neighbourhood);
    public function beforeSave($request, City $city);
    public function findByStreetNameAndCity(City $city,?string $streetName);
    public function findByCityAndNeighbourhood(City $city, Neighbourhood $neighbourhood);
}
