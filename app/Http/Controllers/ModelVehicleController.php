<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ModelVehicleResource;
use App\ModelVehicle;

class ModelVehicleController extends Controller
{
    public function index()
    {
        return ModelVehicleResource::collection(ModelVehicle::all());
    }
}
