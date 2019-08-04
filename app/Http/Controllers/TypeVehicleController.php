<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TypeVehicleResource;
use App\TypeVehicle;

class TypeVehicleController extends Controller
{
    public function index()
    {
        return TypeVehicleResource::collection(TypeVehicle::all());
    }
}
