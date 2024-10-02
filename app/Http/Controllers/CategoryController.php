<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $categories=Category::all();
        return view('backend.category.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.category.new');
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
         $validator=$request->validate(['name'=>['required','string','max:255','unique:categories'],'photo'=>'required|mimes:jpeg,bmp,jpg,png'
    ]);
        if($validator){
            $name=$request->name;
            $photo=$request->photo;
        //dd($name);
        // dd($photo);
            $imageName=time().'.'.$photo->extension();
            $photo->move(public_path('images/category'),$imageName);
            $filePath='images/category/'.$imageName;
        //Data Insert
            $category=new Category;
            $category->name=$name;
            $category->photo=$filePath;
            $category->save();

            return redirect()->route('backside.category.index')->with("successMsg","New Category is ADDED in your data");
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
        //
        $category=Category::find($id);
        return view('backend.category.edit',compact('category'));
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
         $name=$request->name;
        $newphoto=$request->photo;
        $oldphoto=$request->oldphoto;
        if($request->hasFile('photo')){
            $imageName=time().'.'.$newphoto->extension();
            $newphoto->move(public_path('images/category'),$imageName);
            $filePath='images/category/'.$imageName;
            if (\File::exists(public_path($oldphoto)))
            {
                \File::delete(public_path($oldphoto));
            } 
        }
        else{
            $filePath=$oldphoto;
        }
        $category=Category::find($id);
        $category->name=$name;
        $category->photo=$filePath;
        $category->save();
        return redirect()->route('backside.category.index')->with('successMsg','Existing Category is UPDATED in your data');
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
                $category=Category::find($id);
        $category->delete();
        return redirect()->route('backside.category.index')->with('successMsg','Existing Category is DELETED in your data');
    }
}
