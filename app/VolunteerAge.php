<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class VolunteerAge extends Model
{
    protected $table = 'volunteers_ages';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'volunteer_id', 'volunteers_age_gender_id', 'date_of_birth',
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

    public function volunteers_age_gender()
    {
        return $this->belongsTo('App\VolunteerAgeGender','volunteers_age_gender_id');
    }

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $appends = [
        'date_parsed',
    ];

    public function getDateParsedAttribute()
    {
        return Carbon::parse($this->date_of_birth);
    }
}
