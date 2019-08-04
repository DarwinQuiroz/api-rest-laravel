<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RentalStatusResource;
use App\RentalStatus;

class RentalStatusController extends Controller
{
    public function index()
    {
        return RentalStatusResource::collection(RentalStatus::all());
    }
}
