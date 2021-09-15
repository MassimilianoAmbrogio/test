<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerFeature extends Model
{
    protected $table = 'volunteers_features';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'volunteer_id', 'feature_tipology', 'training',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function volunteer()
    {
        return $this->belongsTo('App\Volunteer');
    }

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
