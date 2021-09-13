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
        'feature_tipology', 'training',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
