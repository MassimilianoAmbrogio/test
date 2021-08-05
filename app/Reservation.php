<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'accommodation_id', 'room_id', 'arrival_date', 'nights', 'qty', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function accommodation()
    {
        return $this->belongsTo('App\Accommodation');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
