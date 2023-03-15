<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularBookedTourguide extends Model
{
    protected $table = 'regular_booked_tourguide';
    use HasFactory;
    protected $fillable =[
        'check_in',
        'check_out',
        'status',
        'user_id',
        'tourguide_id'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Tourguide()
    {
        return $this->belongsTo(Tourguide::class);
    }
}
