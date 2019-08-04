<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'model' => new ModelVehicleResource($this->model_vehicle),
            'location' => new LocationResource($this->location),
            'type' => new TypeVehicleResource($this->type_vehicle),
            'current_kilometers' => $this->current_kilometers,
            'engine_size' => $this->engine_size,
            'fuel_type' => $this->fuel_type,
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y')
        ];
    }
}
