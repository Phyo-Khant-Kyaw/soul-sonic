<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

                $artist = Artist::all();

                
         return view('backend.artist.list',compact('artist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.artist.new');
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
           $validator= $request->validate(['name' => ['required','string','max:255','unique:artists'],'photo'=>'required|mimes:jpeg,bmp,png,jpg']);

          if($validator)
          {
        $name= $request->name;
        $photo=  $request->photo;
        $gender= $request->gender;
          //dd($name);
       
               // dd($photo);
       
                $photoName=time().'.'.$photo->extension();
               //dd($imageName);
                $photo->move(public_path('images/artist'),$photoName);
       
                $filepath= 'images/artist/'.$photoName;
       
               // //Data Insert
               $artist = new Artist;
               $artist->name = $name;
               $artist->photo= $filepath;
               $artist->gender=$gender;
               $artist->save();
               return redirect()->route('backside.artist.index')->with("successMsg",'New Artist is ADDED in your data');
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
        $artist= Artist::find($id);
       // dd($category);
        return view('backend.artist.edit',compact('artist'));
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
               $newphoto->move(public_path('images/artist'),$imageName);
       
               $filepath= 'images/artist/'.$imageName;

               if(\File::exists(public_path($oldphoto)))
               {
                \File::delete(public_path($oldphoto));
               }
        }else
        {
                $filepath=$oldphoto;
         }

         $artist=Artist::find($id);
         $artist->name = $name;
         $artist->photo = $filepath;
         $artist->save();

         return redirect()->route('backside.artist.index')->with("successMsg",'Existing artist is Updated in your data');
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
         $artist= Artist::find($id);
        $artist->delete();

        return redirect()->route('backside.artist.index')->with("successMsg",'Existing Artist is DELETED in your data');
    
    }
}
