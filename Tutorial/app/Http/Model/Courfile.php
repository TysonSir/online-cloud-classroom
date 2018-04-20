<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Courfile extends Model
{
    //
    protected $table='courfile';
    protected $primaryKey='cf_id';
    public $timestamps=false;
    protected $guarded=[];
}
