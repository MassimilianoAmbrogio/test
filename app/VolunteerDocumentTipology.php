<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerDocumentTipology extends Model
{
    protected $table = 'volunteers_document_tipologys';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_tipology',
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
