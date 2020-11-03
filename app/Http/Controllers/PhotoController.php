<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PhotoController extends Controller
{
    private $table='photos'; 
     
    //show create form
    public function create($gallery_id ){
        //Render view
        return view ('photo/create',compact('gallery_id'));
    }
    
     
    //Store photo   
    public function store(Request  $request){
        
        //Get request Input
        $gallery_id=$request->input('gallery_id');
        $title=$request->input('title');
        $description=$request->input('description');
        $location=$request->input('location');
        $image=$request->file('image');
        $owner_id=$request->input('owner_id');

        
        //check whether image is upload
        if($image){
            
            $image_filename=$image->getClientOriginalName();
            $image-> move(public_path('/gallery-template/images'),$image_filename);
        
        }
        
        else{
            $image_filename='noimage.jpg';
        }

    
        //insert photo the datbase
        DB::table($this->table)->insert(
        [
        'title'=>$title,
        'description'=>$description,
        'location'=>$location,
        'gallery_id'=>$gallery_id,
        'image'=>$image_filename,
        'owner_id'=>$owner_id,
           
        ]
        );

       
    
        //Rederect
        //  return \Redirect::route('gallery.show',array('id'=>$gallery_id));
         return \Redirect::route('gallery.show',$gallery_id);
       
        // return \Redirect::back();

    }   
    //Show Photo details
    public function details($id){
        //Get photo
       $photo=DB::table($this->table)->where('id',$id)->first();
        
       //Render Template
        return view('photo/details',compact('photo'));

    }
}
