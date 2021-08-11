<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrCluster extends Model
{
    protected $table = 'clusters';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 'name', 'active', 'age', 'city'
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
