<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GalleryController extends Controller
{
    private $table="galleries";
    //List Galleries
    public function index(){
       
            //Get all Galleries
            $galleries=DB::table($this->table)->get();
            $galleries=DB::table('galleries')->simplePaginate(3);  
                

            //render view
            return view('gallery/index',compact($this->table));

    }
    
    
    //show create form
    public function create(){
            return view('gallery/create');
        
    }
    
    //Store Gallery
    public function store(Request  $request){
            //Get request Input
            $name=$request->input('name');
            $description=$request->input('description');
            $coverimage=$request->file('coverimage');
            $owner_id=1;

            //check whether image is upload
            if($coverimage){
                
                $coverimage_filename=$coverimage->getClientOriginalName();
                $coverimage-> move(public_path('/gallery-template/images'),$coverimage_filename);

             //  $coverimage = Image::make(public_path('/Template/images' . $galleries->coverimage))->fit(300, 300, null, 'top-left');
             //  $coverimage->save();
        
            
            }
            
            else{
                $coverimage_filename='noimage.jpg';
            }

        
            //insert into the datbase
            DB::table($this->table)->insert(
            [
            'name'=>$name ,
            'description'=>$description,
            'coverimage'=>$coverimage_filename,
            'owner_id'   =>$owner_id    
            ]
            );
        
            //Rederect
            return \Redirect::route('gallery.index')->with('message','Gallery Created');

    }
    
    
    //Show Gallery Photos
    public function show($id){
            //Get gallery
            $gallery=DB::table($this->table)->where('id',$id)->first();
            //Get photo
            $photos=DB::table('photos')->where('gallery_id',$id)->get();

            //return view
            return view('gallery/show',compact('gallery','photos'));

    }





    public function edit($id)
    {
        $gallery = gallery::find($id);
        return view('gallery.edit', compact('gallery'));        
    }

    public function destroy($id)
    {
    	Galleries::find($id)->delete();
    	return back()
    		->with('success','Album removed successfully.');	
    }
}
