<?php

namespace App\Services;

use App\Models\Office;
use GuzzleHttp\Psr7\Request;

class OfficeService
{
    // Get all Offices
    public function getAllOffices()
    {
        return Office::all();
    }

    // getOfficesByCountry
    public function getOfficesByCountry($country){
        return Office::where('country',$country)->get();
    }
}
