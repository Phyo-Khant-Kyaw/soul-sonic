<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Favorite extends Model
{
    //
            use SoftDeletes;
    protected $fillable=[
    	'song_id','user_id'
    ];
        public function song()
    {
    	return $this->hasMany('App\Song');
    }

    public function user(){
    	return $this->hasMany('App\User');
    	
    }
}
