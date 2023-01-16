<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARAcad1 extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'ARSID'
        ,'StudID'
        ,'Mark'
        ,'Grade'
        ,'Remarks'
        ,'MidA'
        ,'MidI'
        ,'EndA'
        ,'EndI'
        ,'Comment2'
        ,'Comment3'
        ,'AGrade1'
        ,'AGrade2'
        ,'AGrade3'
        ,'AMark1'
        ,'AMark2'
        ,'AMark3'
        ,'AGrade4'
        ,'AGrade5'
        ,'AMark4'
        ,'AMark5'
        ,'AttComment1'
        ,'AttComment2'
        ,'AttComment3'
        ,'Photo1'
        ,'Photo2'
        ,'Photo3'
        ,'Note'
        ,'YMMark'
        ,'YMGrade'
        ,'AltFlag'
        ,'YMFlag'
    ];

    protected $table = 'ARAcad1';
    protected $primaryKey = 'AcadID';

    public function colData()
    {
        return $this->hasMany(ARAssColData::class, 'AcadID', 'AcadID');
    }

    public function subject()
    {
        return $this->belongsTo(ARSubject::class, 'ARSID', 'ARSID');
    }

}
