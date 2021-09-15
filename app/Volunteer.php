<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table = 'volunteers';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $appends = [
        'nome_completo',
    ];

    public function getNomeCompletoAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }
}
