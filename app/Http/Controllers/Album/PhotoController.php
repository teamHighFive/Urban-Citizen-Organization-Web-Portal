<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PhotoController extends Controller
{

     // --------------------------------------------------------------------------------------------------
    // Create a new controller instance.
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index','show']]);
    }
    
    private $table='photos';

    //show create form
    public function create($album_id )
    {
        //Render view
        return view ('gallery.photo.create',compact('album_id'));
    }


    //Store photo
    public function store(Request  $request)
    {

        //Get request Input
        $album_id=$request->input('album_id');
        $caption=$request->input('caption');
        $description=$request->input('description');
        $location=$request->input('location');
        $image=$request->file('image');


        //check whether image is upload
        if($image){

            $image_filename=$image->getClientOriginalName();
            $image-> move(public_path('/album-template/images'),$image_filename);

        }

        else{
            $image_filename='noimage.jpg';
        }

        //insert photo the datbase
        DB::table($this->table)->insert(
        [
        'caption'=>$caption,
        'description'=>$description,
        'location'=>$location,
        'album_id'=>$album_id,
        'image'=>$image_filename,


        ]
        );



        //Rederect
        //  return \Redirect::route('album.show',array('id'=>$album_id));
         return \Redirect::route('album.show',$album_id);

        // return \Redirect::back();

    }
    //Show Photo details
    public function details($id)
    {
        //Get photo
       $photo=DB::table($this->table)->where('id',$id)->first();

       //Render Template
        return view('gallery.photo.details',compact('photo'));

    }
}
