<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'description',
        'price',
        'n_of_people',
        'n_of_places',
        'n_of_days',
        'cover_img'
        
    ];
       
    public function Place()
    {
        return $this->hasMany(Place::class );
    }
    public function User(){
        return $this->hasMany(User::class  );
    }
    public function TripImg(){
        return $this->hasMany(TripImg::class );
    }
}
