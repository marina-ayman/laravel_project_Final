<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacesOfRecommTrips extends Model
{
    use HasFactory;


    protected $fillable =[
        'trip_id',
        'place_id'

    ];

    public function Trip(){
        return $this->hasMany(Trip::class);
    }
    public function Place(){
        return $this->hasMany(Place::class);
    }


}
