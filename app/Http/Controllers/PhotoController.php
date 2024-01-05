<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Category;

class PhotoController extends Controller
{

    public function index()
    {
        $photo = Photo::orderByRaw("RAND()")->paginate(12);
        $cat = Category::all();
        return view('photos.index')->with('photo',$photo)->with('cat',$cat);
    }

    
    public function create()
    {
        return view('photos.create');
    }


    public function store(Request $request)
    {
        if($request->name=="")
        {
            return redirect('photos/create')->with('alert',"Please Fill the Category Name"); 
        }
        $uri = strtolower($request->name);
        $uri = str_replace(' ', '-', $uri);
        $category = new Category;
        $category->name = $request->name;
        $category->uri = $uri;
        $category->save();
        return redirect('photos/create')->with('status',"Successfully Added");
    }

    
    public function show($id)
    {
        $uri = str_replace('-', ' ', $id);
        $uri = ucwords($uri);
        $cat = Category::where('uri',$id)->first();
        $photo = Photo::where('cat_id',$cat->id)->orderBy('id','DESC')->paginate(6);
        $cat = Category::all();
        return view('photos.show')->with('photo',$photo)->with('cat',$cat)->with('name',$uri);
    }


    public function edit($id)
    {
        $photo = Photo::where('id',$id)->first();
        $cat = Category::where('id',$photo['cat_id'])->first();
        $category =Category::all(); 
        return view('photos.edit')->with('photo',$photo)->with('category',$category)->with('cat',$cat);
    }

    
    public function update(Request $request, $id)
    {

        $photo = Photo::find($id);
        $photo->cat_id = $request['cat'];
        $photo->save();
        return redirect('photos/'.$id.'/edit')->with('status',"Successfully Updated");
    }


    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return redirect('photos/walldetail')->with('status',"Successfully Deleted Record");
    }
}
