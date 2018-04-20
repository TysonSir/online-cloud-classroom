<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $table = 'homework';
    protected $primaryKey = 'hw_id';
    public $timestamps = false;//不自动加时间字段
    protected $guarded = [];//添加字段保护，除了设定的
}
