<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARAssColData extends Model
{
    protected $table = 'ARAssColData';
    protected $primaryKey = 'ARAssColDataID';
    public $timestamps = false;
    protected $fillable = [
        'ARAssColID'
        ,'AcadID'
        ,'Mark'
        ,'Grade'
        ,'Det1'
        ,'Det2'
        ,'Det3'
        ,'Comment1'
        ,'Comment2'
        ,'Comment3'
        ,'SMS1Sent'
        ,'Email1Sent'
        ,'SMS2Sent'
        ,'Email2Sent'
        ,'AltFlag'
    ];

    public function acad1()
    {
        return $this->belongsTo(ARAcad1::class, 'AcadID', 'AcadID');
    }

    public function Col()
    {
        return $this->belongsTo(ARAssCol::class, 'ARAssColID', 'ARAssColID');
    }
}
