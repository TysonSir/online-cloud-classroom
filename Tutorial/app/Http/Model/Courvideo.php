<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Courvideo extends Model
{
    protected $table='courvideo';
    protected $primaryKey='cv_id';
    public $timestamps=false;
    protected $guarded=[];
}
