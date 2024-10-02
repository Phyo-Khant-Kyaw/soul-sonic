<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Album extends Model
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

    public function artists()
    {
    	return  $this->belongsToMany('App\Artist','album_artist','album_id','artist_id') -> withTimestamps();
    }

 
}
