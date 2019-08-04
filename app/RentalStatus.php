<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalStatus extends Model
{
    protected $guarded = ['id'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
