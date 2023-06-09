<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'budget',
        'check_in',
        'check_out',
        'n_of_adults',
        'n_of_childeren',
        'check_out',
        'n_of_days'
    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }

    // public function PlacesOfRecommTrips()
    // {
    //     return $this->belongsTo(placesOfRecommTrips::class);
    // }
    public function BookedRoom()
    {
        return $this->hasMany(BookedRoom::class );
    }
    public function Hotel()
    {
        return $this->belongsToMany(Hotel::class );
    }

    public function Tourguide()
    {
        return $this->belongsTo(Tourguide::class );
    }
    public function BookTourguide(){
        return $this->belongsTo(BookTourguide::class );
    }
    public function Places()
    {
        return $this->hasMany(Places::class );
    }
    public function OrderedPlaces(){
        return $this->hasMany(OrderedPlaces::class );
    }
    public function OrderedRoom()
    {
        return $this->hasMany(OrderedRoom::class );
    }


}
