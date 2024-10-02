<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
    	'name','photo'
    ];
        public function song()
    {
    	return $this->hasMany('App\Song');
    }
}
