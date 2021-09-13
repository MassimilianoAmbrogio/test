<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'date_of_birth', 'gender',
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
