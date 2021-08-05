<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'driver_id', 'brand', 'model', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}