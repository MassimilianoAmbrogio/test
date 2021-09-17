<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerFeatureTipology extends Model
{
    protected $table = 'volunteers_feature_tipologys';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'feature_tipology_id', 'feature_tipology',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function feature_volunteer()
    {
        return $this->belongsTo('App\VolunteerFeature');
    }

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
