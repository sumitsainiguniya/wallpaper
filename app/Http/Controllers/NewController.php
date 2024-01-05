<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Category;

class NewController extends Controller
{
    public function index()
    {
        $cat = Category::paginate(5);
        return view('photos.categorydetail')->with('cat',$cat);
    }

    public function edit($id)
    {
        $category = Category::where('id',$id)->first(); 
        return view('photos.catedit')->with('category',$category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request['name'];
        $uri = strtolower($request['name']);
        $uri = str_replace(' ', '-', $uri);
        $category->uri = $uri;
        $category->save();
        return redirect('photos/categorydetail/'.$id.'/edit')->with('status',"Successfully Updated");
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $photo = Photo::where('cat_id',$id)->first();
        if($category->id== $photo['cat_id'])
        {
            return redirect('photos/categorydetail')->with('alert',"Category Cannot be Deleted Beacuse this Category Cantains Photos");
        }        
        $category->delete();
        return redirect('photos/categorydetail')->with('status',"Successfully Deleted Record");
    }


    public function index1()
    {
        $photo = Photo::orderByRaw("RAND()")->paginate(12);
        $cat = Category::all();
        return view('photos.index')->with('photo',$photo)->with('cat',$cat);
    }

    public function addwall()
    {
    	$cat = Category::all();
        return view('photos.addwallpaper')->with('cat',$cat);
    }
    public function imageUploadPost(Request $request)
    {
        if($request['cat']==0)
        {
            return redirect('photos/addwallpaper')->with('alert',"Please Select the Category");
        }

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:112048',
        ]);
        $imageName = request()->image->getClientOriginalName();
        $filename = pathinfo($imageName, PATHINFO_FILENAME);
        $uri = strtolower($filename);
        $uri = str_replace(' ', '-', $uri);
        request()->image->move(public_path('images'), $imageName);
        $upload = new Photo;
        $upload->name = $imageName;
        $upload->cat_id = $request->cat;
        $upload->uri = $uri;
        $upload->save();
        return back()->with('success','You have successfully upload image.')
        ->with('image',$imageName);
    }
    public function walldetail()
    {
        $photo = Photo::orderBy('id','DESC')->paginate(9);
        return view('photos.walldetail')->with('photo',$photo);
    }
    public function latest()
    {
        $photo = Photo::orderBy('id','DESC')->paginate(6);
        $cat = Category::all();
        return view('photos.index')->with('photo',$photo)->with('cat',$cat);
    }
    public function random()
    {
        $photo = Photo::orderByRaw("RAND()")->paginate(6);
        $cat = Category::all();
        return view('photos.index')->with('photo',$photo)->with('cat',$cat);
    }
    public function categorydetail()
    {
        $cat = Category::paginate(5);
        return view('photos.categorydetail')->with('cat',$cat);
    }
    public function categories()
    {
        $cat = Category::paginate(50);
        return view('photos.categories')->with('cat',$cat);
    }
    public function search(Request $request)
    {
        $category = $request->input('search');
    //now get all user and services in one go without looping using eager loading
    //In your foreach() loop, if you have 1000 users you will make 1000 queries

        $photo = Photo::where('name',$category)->get();
        dd($photo);
        //return view('photos.index', compact('photo'));
    }

}

