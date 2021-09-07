<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationHotel extends Model
{
    protected $table = 'reservation_hotels';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'arrival_date', 'nights', 'num_pax', 'has_lunch', 'room_type', 'price',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
