<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Album;
use App\Photo;
use Illuminate\Support\Facades\Storage;


class AlbumController extends Controller
{

    // --------------------------------------------------------------------------------------------------
    // Create a new controller instance.
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index','show']]);
    }
    
    // --------------------------------------------------------------------------------------------------
    // Display a listing of the Albums
    // --------------------------------------------------------------------------------------------------
    public function index(){

            //Get all Albums
            $albums=Album::orderBy('title','asc')->get();
            


            //render view
            return view('gallery.index')->with('albums', $albums);
           
    }

    // --------------------------------------------------------------------------------------------------
    // Show the form for creating a new Album
    // --------------------------------------------------------------------------------------------------
   
    public function create(){
            return view('gallery.create');

    }

    // --------------------------------------------------------------------------------------------------
    // Store a newly created Album in storage.
    // --------------------------------------------------------------------------------------------------
    public function store(Request  $request){

            //validate inputs
            $this->validate($request,[
                'title'=>'required|max:100',
                'description'=>'required|max:255',
                'coverimage'=>'required|image|mimes:jpeg,jpg|max:2048',
            ]);


            //check whether image is upload
            if($request->hasFile('coverimage')){
                $filenameWithExt = $request->file('coverimage')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('coverimage')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('coverimage');
                $path-> move(public_path('/gallery-resourses/images'),$fileNameToStore);
            }

            else{
                $fileNameToStore='noimage.jpg';
                
            }

            //insert into datbase
            $album=new Album;
            $album->title = $request->input('title');
            $album->description = $request->input('description');
            $album->coverimage = $fileNameToStore;
            $album->save();
            
            
            //Rederect
            return redirect('/gallery')->with('success','Album created.');

    }


    // --------------------------------------------------------------------------------------------------
    // Display the specified Album
    // --------------------------------------------------------------------------------------------------
    
    public function show($id){
            
            //Get Album
            // $album=Album::where('id',$id)->first();
            $album = Album::find($id);
            //Get photo
            $photos=Photo::where('album_id',$id)->get();

            //return view
            return view('gallery.show',compact('album','photos'));

            // $album = Album::find($id);
            // return view('gallery.show')->with('album',$album);
    }



    // --------------------------------------------------------------------------------------------------
    // Show the form for editing the specified Album
    // --------------------------------------------------------------------------------------------------
    public function edit($id){
        //TODO edit function
        $album=Album::find($id);
        return view('gallery.edit')->with('album',$album);
    }

    
    // --------------------------------------------------------------------------------------------------
    // Update the specified Album in storage.
    // --------------------------------------------------------------------------------------------------
    public function update(Request $request, $id){

        //validate inputs
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=>'required|max:255',
            'coverimage'=>'required|image|mimes:jpeg,jpg|max:2048',
        ]);


        //check whether image is upload
        if($request->hasFile('coverimage')){
            $filenameExt = $request->file('coverimage')->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('coverimage')->getClientOriginalExtension();
            $fileNameToStore =time().'.'.$filename.$extension;
            $path = $request->file('coverimage');
            $path-> move(public_path('/gallery-resourses/images'),$fileNameToStore);
        }

        $donevents=Album::find($id);
        if(is_null($donevents)){
        abort(404);
        }

        $album=Album::find($id);
        $album->title = $request->input('title');
        $album->description = $request->input('description');
        if($request->hasFile('coverimage')){
            $album->coverimage = $fileNameToStore;
        }
        $album->save();
        
        return redirect('/gallery')->with('success','Album Edited');
        
    }
    
    // --------------------------------------------------------------------------------------------------
    // Remove the specified resource from Album
    // --------------------------------------------------------------------------------------------------
    public function destroy($id){

        $albums=Album::find($id);
        $albums->delete($id);
        return redirect('/gallery')->with('success','Album  Deleted');

    }

}
