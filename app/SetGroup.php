<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetGroup extends Model
{
    protected $primaryKey='OGID';
    protected $fillable=[
        'OGYear'
        ,'OGTerm'
        ,'AcYear'
        ,'OGName'
        ,'PrevOGID'
        ,'SubjSel'
        ,'SubjSelMin'
    ];

    protected $table = 'TTOptGroup';
    public $timestamps = false;
}
