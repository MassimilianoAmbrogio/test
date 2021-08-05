<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrivalsDeparturesType extends Model
{
    protected $table = 'arrivals_departures_types';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'active',
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
