<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $table = 'talk';
    protected $primaryKey = 'talk_id';
    public $timestamps = false;//不自动加时间字段
    protected $guarded = [];//添加字段保护，除了设定的
}
