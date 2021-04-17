<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;
use App\PhilippineRegion;
use App\PhilippineProvince;
use App\PhilippineCity;
use App\PhilippineBaranggay;
use App\Http\Resources\PhilippineRegion as PhilippineRegionResource;
use App\Http\Resources\PhilippineProvince as PhilippineProvinceResource;
use App\Http\Resources\PhilippineCity as PhilippineCityResource;
use App\Http\Resources\PhilippineBaranggay as PhilippineBaranggayResource;

class PSGCApiController extends Controller
{
    public function allRegions()
    {
        $regions = PhilippineRegion::all();

        if ($regions) {
            return PurposeResource::collection($regions);
        }

        return response()->json('No regions found.');
    }

    public function provinces($code)
    {
        $provinces = PhilippineProvince::where('region_code', $code)->get();

        if ($provinces) {
            return PhilippineProvinceResource::collection($provinces);
        }

        return response()->json('No provinces with matching region_code found.');
    }

    public function cities($code)
    {
        $cities = PhilippineCity::where('province_code', $code)->get();

        if ($cities) {
            return PhilippineCityResource::collection($cities);
        }

        return response()->json('No cities with matching province_code found.');
    }

    public function brgys($code)
    {
        $brgys = PhilippineBaranggay::where('city_municipality_code', $code)->get();

        if ($brgys) {
            return PhilippineBaranggayResource::collection($brgys);
        }

        return response()->json('No brgys with matching city_municipality_code found.');
    }
}
