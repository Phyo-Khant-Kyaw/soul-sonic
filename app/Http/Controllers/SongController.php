<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Album;
use App\Artist;
use App\Category;
use Illuminate\Support\Facades\DB;
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs=Song::all();
        $albums=Album::all();
        $artists=Artist::all();
        $categories=Category::all();
        return view('backend.song.list',compact('songs','albums','artists','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums=Album::all();
        $artists=Artist::all();
        $categories=Category::all();
        return view('backend.song.new',compact('albums','artists','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator=$request->validate(['name'=>['required','string','max:255','unique:categories'],'photo'=>'required|mimes:jpeg,bmp,jpg,png'
   ]);
       if($validator){
        $name=$request->name;
        $photo=$request->photo;
        $file=$request->file;
        $artist=$request->artist_id;

        
        $album=$request->albumid;
        $category=$request->categoryid;


        $fileName=time().'.'.$file->extension();
        $file->move(public_path('images/file'),$fileName);
        $filePath1='images/file/'.$fileName;

        //dd($name);
        // dd($photo);
        $imageName=time().'.'.$photo->extension();
        $photo->move(public_path('images/song'),$imageName);
        $filePath='images/song/'.$imageName;
        //Data Insert
        $song=new Song;
        $song->name=$name;
        $song->photo=$filePath;
        $song->file=$filePath1;
        $song->artist_id=$artist;
        $song->album_id=$album;
        $song->category_id=$category;
        $song->save();

        return redirect()->route('backside.song.index')->with("successMsg","New Song is ADDED in your data");
    }
    else{
        return redirect::back()-withErrors($validator);
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
        $albums=Album::all();
        $artists=Artist::all();
        $categories=Category::all();
        $songs=Song::find($id);
        return view('backend.song.edit',compact('songs','albums','artists','categories'));
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
               $validator = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
        ]);

        if ($validator) {
            $name = $request->name;
            $newphoto=$request->photo;

            $oldphoto=$request->oldPhoto;
            $artist = $request->artistid;
            $album = $request->albumid;
            $category = $request->categoryid;
            //dd($newphoto);
             if($request->hasFile('photo')) {
                //dd("fghj");

             $imageName=time().'.'.$newphoto->extension();
               //dd($imageName);
               $newphoto->move(public_path('images/song'),$imageName);
       
               $filePath= 'images/song/'.$imageName;

               if(\File::exists(public_path($oldphoto)))
               {
                \File::delete(public_path($oldphoto));
               }
        }
        else
        
        {
                 $filePath=$oldphoto;
         }


            $song=Song::find($id);
            $song->name=$name;
            $song->photo = $filePath;
            $song->artist_id=$artist;
            $song->album_id=$album;
            $song->category_id=$category;
            $song->save();

            return redirect()->route('backside.song.index')->with("successMsg", "New Item is UPDATED in your data");


        }else{
              return Redirect::back()->withErrors($validator);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $song=Song::find($id);
      $song->delete();
      return redirect()->route('backside.song.index')->with('successMsg','Existing Song is DELETED in your data');
  }

  public function albumartist(Request $request){
    $id=request('id');
    if($id==5){
        $albumartist=Artist::all();

    }else{
       $albumartist=DB::table('album_artist')
                  ->join('artists', 'artists.id', '=', 'album_artist.artist_id')
                  ->select('artists.name','album_artist.*')
                  ->where('album_artist.album_id','=',$id)
                  ->get(); 
    }
    
                 // dd($albumartist);
                  return $albumartist;

  }
}
