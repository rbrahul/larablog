<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table="image_gallery";
    protected $guarded=[];
    protected $fillable=['caption','image_name'];
}
