<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularBookedPlace extends Model
{
    public $timestamps = FALSE;
    protected $table = 'regular_booked_places';
    use HasFactory;

    protected $fillable =[
        'check_in',
        'check_out',
        'status',
        'user_id',
        'place_id'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Place()
    {
        return $this->hasMany(Place::class);
    }


}
