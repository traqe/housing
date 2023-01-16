<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'tblbatches';
    protected $fillable = ['batch', 'created_by', 'updated_by', 'created_at', 'updated_at', 'batch_type_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function batchtype()
    {
        return $this->belongsTo(BatchType::class, 'batch_type_id');
    }
}
