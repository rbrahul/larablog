<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use SoftDeletes;
    protected $table='blogposts';
    protected $dates=['deleted_at','created_at','updated_at'];
    protected $guarded=[];
    protected $fillable=['title','content','thumbnail','created_by'];
}
