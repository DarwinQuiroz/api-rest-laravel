<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\VehicleResource;
use App\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        return VehicleResource::collection(Vehicle::all());
    }

    public function show($id)
    {
        return new VehicleResource(Vehicle::findOrfail($id));
    }
}
