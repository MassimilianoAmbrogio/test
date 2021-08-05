<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrivalsDeparture extends Model
{
    protected $table = 'arrivals_departures';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'arrival_departure_id', 'transport_id', 'date_arrival_departure', 'hour_arrival_departure', 'place_arrival_departure_id', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function arrival_departure()
    {
        return $this->belongsTo('App\ArrivalsDeparturesType');
    }

    public function transport()
    {
        return $this->belongsTo('App\ArrivalsDeparturesMean');
    }

    public function place_arrival_departure()
    {
        return $this->belongsTo('App\ArrivalsDeparturesVenue');
    }

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
