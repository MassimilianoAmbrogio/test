<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerAgeGender extends Model
{
    protected $table = 'volunteers_age_genders';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender'
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
