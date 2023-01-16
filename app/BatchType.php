<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchType extends Model
{
    protected $table = 'tblbatchtypes';
    protected $fillable =['batchtype'];
    public $timestamps = false;

    public function batches(){
        return $this->hasMany(Batch::class);
    }
}
