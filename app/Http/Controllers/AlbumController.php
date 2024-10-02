<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Artist;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $albums = Album::all();

        return view('backend.album.list',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $artists=Artist::all();
         return view('backend.album.new',compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
                
          $validator= $request->validate(['name' => ['required','string','max:255','unique:albums']]);

         if($validator)
         {
        $name= $request->name;
        $photo=  $request->photo;
        $artist_id= $request->artist_id;
        

          //dd($name);
       
               // dd($logo);
       
                $photoName=time().'.'.$photo->extension();
               //dd($imageName);
                $photo->move(public_path('images/album'),$photoName);
       
                $filepath= 'images/album/'.$photoName;
       
               // //Data Insert
               $album = new Album;
               $album->name = $name;
               $album->photo= $filepath;
               $album->save();
               if($artist_id){
               $album->artists()->attach($artist_id);
               }

               

               return redirect()->route('backside.album.index')->with("successMsg",'New Artist is ADDED in your data');
           }
           else{
            return redirect::back()->widthErrors($validator);
           }
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
        $album= Album::find($id);
        $artists=Artist::all();

       
       // dd($category);
        return view('backend.album.edit',compact('album','artists'));
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
       $name= $request->name;
        $newphoto = $request->photo;
        $oldphoto = $request->oldphoto;
        //dd($name);
        //dd($newphoto);
        //dd($oldphoto);
        if ($request->hasFile('photo')) {

             $imageName=time().'.'.$newphoto->extension();
               //dd($imageName);
               $newphoto->move(public_path('images/album'),$imageName);
       
               $filepath= 'images/album/'.$imageName;

               if(\File::exists(public_path($oldphoto)))
               {
                \File::delete(public_path($oldphoto));
               }
        }else
        {
                $filepath=$oldphoto;
         }

         $album=Album::find($id);
         $album->name = $name;
         $album->photo = $filepath;
         $album->save();

         return redirect()->route('backside.album.index')->with("successMsg",'Existing Album is Updated in your data');

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
        $album= Album::find($id);
        $album->delete();

        return redirect()->route('backside.album.index')->with("successMsg",'Existing Album is DELETED in your data');

    }
}
