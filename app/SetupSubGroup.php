<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetupSubGroup extends Model
{
    protected $primaryKey = 'RowID';
    public $timestamps = false;
    protected $fillable = [
        'OptGroupID'
        ,'SSID'
        ,'Section'
        ,'OGSID'
        ,'Teacher1ID'
        ,'Teacher2ID'
    ];

    protected $table = 'TTOptSubjGroupSel';
}
