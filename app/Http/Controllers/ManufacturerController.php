<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use App\Http\Resources\ManufacturerResource;
use Illuminate\Validation\ValidationException;

class ManufacturerController extends Controller
{
    public function index()
    {
        return ManufacturerResource::collection(Manufacturer::all());
    }

    public function store()
    {
        if(request()->ajax())
        {
            try
            {
                $this->validate(request(), [
                    'name' => 'required|min:5',
                    'details' => 'required',
                ]);

                $manufacturer = Manufacturer::create([
                    'name' => request('name'),
                    'details' => request('details')
                ]);

                return response()->json([
                    'ok' => true,
                    'message' => 'Manufacturer created',
                    'manufacturer' => $manufacturer
                ]);
            }
            catch(ValidationException $e)
            {
                return response()->json($e->validator->errors());
            }
        }
        abort(401);
    }
}
