<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspectionStages extends Model
{
    protected $table = 'tblinspection_stages';
    protected $fillable = ['id', 'stage', 'created_at', 'created_by', 'updated_at'];
}
