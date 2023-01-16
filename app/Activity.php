<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //

    protected $table = 'ACMActCode';
    public $timestamps = false;
    public $primaryKey = 'CodeID';

    public $fillable = ['CodeName','CodeNo'];

    public function comment()
    {
        return $this->belongsTo(ActivityComment::class, 'CodeNo','Code');
    }
}
