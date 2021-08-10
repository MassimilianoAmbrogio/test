<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateNight extends Model
{
    protected $table = 'date_nights';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data_inizio', 'numero_notti', 'data_fine',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
