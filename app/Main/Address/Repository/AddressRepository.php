<?php
namespace App\Main\Address\Repository;

use App\Models\Address;
use App\Models\City;
use App\Models\Neighbourhood;

class AddressRepository implements AddressRepositoryInterface
{

    public function findOrCreate($request, City $city, Neighbourhood $neighbourhood)
    {
        $address = new Address();
        if ($request->filled('street_name')){
            $addressFinded = $this->findByStreetNameAndCity($city->id, $request->streetName());
            if (empty($addressFinded)){
               $address->street_name = $request->street_name();
               $address->city_id = $city->id;
               $address->neighbourhood_id = $request->neighbourhood_id;
               $address->municipality_id = $request->municipality_id;
               $address->sector_id = $request->sector_id;
               $address->zip_code = $request->zip_code;
               $address->save();
               return $address;
            }
        }
    }
    public function findByCityAndNeighbourhood(City $city, Neighbourhood $neighbourhood)
    {
        return Address::where([['city_id', $city->id], ['neighbourhood', $neighbourhood->id]])->first();
    }
    public function beforeSave($request, City $city)
    {

        if ($request->filled('steet_name')){
            $address = $this->findByStreetNameAndCity($city->id, $request->streetName());
        }
    }
    public function findByStreetNameAndCity(City $city, ?string $streetName)
    {
        return Address::where([['street_name', $streetName], ['city_id', $city->id]])->first();
    }
}
