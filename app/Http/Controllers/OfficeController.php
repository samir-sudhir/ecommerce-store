<?php

namespace App\Http\Controllers;

use App\Services\OfficeService;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    protected $officeService;

    public function __construct(OfficeService $officeService)
    {
        $this->officeService = $officeService;
    }

    // Get all offices
    public function index()
    {
        $offices = $this->officeService->getAllOffices();
        return response()->json($offices);
    }

    public function getOfficesByCountry($country){
        $office=$this->officeService->getOfficesByCountry($country);

        $message="This is your required data";

        return success($message,200,$office);
        
    }
}
