<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerDocument extends Model
{
    protected $table = 'volunteers_documents';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_tipology', 'document_type',
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
