<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $table = 'accommodations';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'address', 'post_code', 'city', 'phone', 'accommodation_type_id', 'user_id', 'accommodation_treatment_id', 'cluster_id', 'checkin_date', 'nights', 'checkout_date', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function accommodation_type()
    {
        return $this->belongsTo('App\AccommodationType');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function accommodation_treatment()
    {
        return $this->belongsTo('App\AccommodationTreatment');
    }

    public function cluster()
    {
        return $this->belongsTo('App\Cluster');
    }

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
