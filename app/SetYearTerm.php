<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetYearTerm extends Model
{

    protected $primaryKey  = 'OGID';
    protected $fillable = ['OGYear','OGTerm','AcYear','OGName','SubjSel','SubjSelMin'];

    protected $table = 'TTOptGroup';

    public $timestamps = false;
    
}
