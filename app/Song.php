<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Song extends Model
{
    //
     use SoftDeletes;
    protected $fillable=[
    	'name','photo','file','artist_id','album_id','category_id'
    ];
        public function album()
    {
    	return $this->belongsto('App\Album');
    }

    public function artist(){
    	return $this->belongsto('App\Artist');
    	
    }

        public function category(){
    	return $this->belongsto('App\Category');
    	
    }

}
