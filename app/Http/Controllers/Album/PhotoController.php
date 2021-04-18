<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Photo;
use App\Album;

class PhotoController extends Controller
{

     // --------------------------------------------------------------------------------------------------
    // Create a new controller instance.
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['create','details']]);
    }
    
    // private $table='photos';

    //show create form
    public function create($album_id )
    {
        //Render view
        return view ('gallery.photo.create',compact('album_id'));
    }

    

    //Store photo
    function store(Request  $request)
    {

    //   //validate inputs
    //   $this->validate($request,[
    //     'caption'=>'max:100',
    //     'description'=>'max:255',
    //     'location'=>'max:100',
    //     'image'=>'required|image|mimes:jpeg,jpg|max:2048',
    // ]);

        
  if($request->hasFile('image')) {
    $images = $request->file('image');
    foreach($images as $image) {
      $filename = $image->getClientOriginalName();
      $extension=$image->getClientOriginalExtension();
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      $path = $image;
      $path-> move(public_path('/gallery-resourses/images'),$fileNameToStore);

      $photo = new Photo();

      $photo->album_id = $request->input('album_id');
      $photo->caption = $request->input('caption');
      $photo->description = $request->input('description');
      $photo->location = $request->input('location');
      $photo->image=$fileNameToStore;
      $photo->save();
     
    }
  }


  return \Redirect::route('album.show',$photo->album_id)->with('message','Photo added to album.');
  
      
        
}

    //Show Photo details
    public function details($id)
    {
        //Get photo
       $photo=Photo::table($this->table)->where('id',$id)->first();

       //Render Template
        return view('gallery.photo.details',compact('photo'));

    }

    public function destroy($id){

        $photos=Photo::find($id);
        $photos->delete($id);
        return \Redirect::route('album.show',$photos->album_id);

    }
}
