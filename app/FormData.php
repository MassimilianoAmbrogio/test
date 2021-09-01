<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    protected $table = 'form_datas';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'number_flight_arrival', 'airline_arrival', 'departure_city', 'arrival_date', 'arrival_hour', 'number_flight_departure', 'airline_departure', 'arrival_city', 'departure_date', 'departure_hour', 'passport_number', 'passport_expiry_date', 'passport_img', 'hotel', 'tipology_room', 'special_request', 'active',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
