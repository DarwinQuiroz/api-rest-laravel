<?php

namespace App\Http\Controllers;

use App\Rental;
use App\Http\Resources\RentalResource;
use App\Customer;

class RentalController extends Controller
{
    public function index()
    {
        return RentalResource::collection(Rental::all());
    }

    public function paginate()
    {
        return RentalResource::collection(Rental::paginate(2));
    }

    public function forCustomer(Customer $customer)
    {
        return RentalResource::collection(Rental::whereCustomerId($customer->id)->get());
    }
}
