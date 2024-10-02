<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Album;
use App\Artist;
use App\Favorite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                


        $songs= DB::table('favorites')
         ->join('songs', 'songs.id', '=', 'favorites.song_id')

            
            ->select( 'songs.id','songs.name as sname' ,'songs.photo as sphoto','songs.file as sfile')
            ->where('favorites.user_id' ,'=', Auth::user()->id)

            ->get();
            //dd($songs);
 
        return view('frontend.playlist',compact('songs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //dd($id);
      /*  $uid=$request->uid;
        dd($uid);

        $favorite= new Favorite;
        $favorite->song_id=$id;
        $favorite->user_id=$uid;
        $favorite->save();
         return redirect()->route('song');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      
    }
  




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function favorite(Request $request)
    {
        $sid=$request->sid;
        $uid=$request->uid;

        $favorite = new Favorite;

        $favorite->song_id=$sid;
        $favorite->user_id=$uid;
        $favorite->save();
    }
}
