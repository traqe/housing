<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectComment extends Model
{
    protected $table = 'ARCommTempl';
    protected $fillable = [ 'Seq','Comments','CommCode'];
    protected $primaryKey = 'CTID';
    public $timestamps = false;
}
