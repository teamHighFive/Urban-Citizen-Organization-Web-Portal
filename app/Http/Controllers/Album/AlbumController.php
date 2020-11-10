<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Album;
use Session;

class AlbumController extends Controller
{
    private $table="albums";
    //List Albums
    public function index(){

            //Get all Albums
            $albums=DB::table($this->table)->get();
            $albums=DB::table('albums')->simplePaginate(3);


            //render view
            return view('gallery.index',compact($this->table));
    }


    //show create form
    public function create(){
            return view('gallery.create');

    }

    //Store Albums
    public function store(Request  $request){
            //Get request Input
            $title=$request->input('title');
            $description=$request->input('description');
            $coverimage=$request->file('coverimage');


                //check whether image is upload
                if($coverimage){

                $coverimage_filename=$coverimage->getClientOriginalName();
                $coverimage-> move(public_path('/gallery-resourses/images'),$coverimage_filename);

                }

            else{
                $coverimage_filename='noimage.jpg';
                }

                //insert into the datbase
                DB::table($this->table)->insert(
                [
                'title'=>$title,
                'description'=>$description,
                'coverimage'=>$coverimage_filename,
                ]
                );

            //Rederect
            return \Redirect::route('album.index')->with('message','Album Created');

    }


    //Show Album Photos
    public function show($id){
            //Get Album
            $album=DB::table($this->table)->where('id',$id)->first();
            //Get photo
            $photos=DB::table('photos')->where('album_id',$id)->get();

            //return view
            return view('album/show',compact('album','photos'));
    }





    public function edit($id){
        $albums=DB::table($this->table)->find($id);
        return \Redirect::route('album.index')->with('message','Album Deleted');
    }

    public function update(Request $request, $id){
            $title=$request->input('title');
            $description=$request->input('description');
            $coverimage=$request->file('coverimage');

            if($coverimage){

                $coverimage_filename=$coverimage->getClientOriginalName();
                $coverimage-> move(public_path('/gallery-resourses/images'),$coverimage_filename);

                }

            else{
                $coverimage_filename='noimage.jpg';
                }

                DB::table($this->table)->insert(
                    [
                    'title'=>$title,
                    'description'=>$description,
                    'coverimage'=>$coverimage_filename,
                    ]
                    );


                    return view('album/show',compact('album','photos'));
    }

    public function destroy($id){

        $albums=DB::table($this->table)->find($id);
        $albums=DB::table('albums')->delete($id);
        return \Redirect::route('album.index')->with('message','Album Deleted');

    }

}
