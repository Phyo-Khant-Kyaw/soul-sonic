<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Artist extends Model
{
    //
        use SoftDeletes;
    protected $fillable=[
    	'name','photo','gender'
    ];
        public function song()
    {
    	return $this->hasMany('App\Song');
    }

    public function album(){
    	return $this->belongsToMany('App\Album','artist_album','album_id','artist_id')->withPivot() -> withTimestamps();;
    	
    }
}
