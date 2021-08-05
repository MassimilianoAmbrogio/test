<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccommodationTreatment extends Model
{
    protected $table = 'accommodation_treatments';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'active',
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
