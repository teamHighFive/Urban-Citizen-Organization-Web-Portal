<?php

namespace App\Http\Controllers\Donation;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class DonationController extends Controller
{
    private $table="donation_events";
    //List Galleries
    public function index(){

            //Get all Galleries
            $donevents=DB::table($this->table)->get();

             $donevents=DB::table($this->table)->simplePaginate(3);

            //render view

            return view('donation.index',compact('donevents'));

    }


    //show create form
    public function create(){
            return view('donation/createdonevent');

    }
    public function donate(){
        return view('donation/form');

}


    //Store Gallery
    public function store(Request  $request){
            //Get request Input
            $name=$request->input('name');
            $description=$request->input('description');
            $coverimage=$request->file('coverimage');


            //check whether image is upload
            if($coverimage){

                $coverimage_filename=$coverimage->getClientOriginalName();
                $coverimage-> move(public_path('donation-resourses/events/images'),$coverimage_filename);

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

                ]
                );
                //Rederect
               // return \Redirect::route('donation.donindex')->with('message','Event Created');
                //return view('donation/donindex');
                //return \Redirect::route('album.index')->with('message','Album Created');
               // return view('donation/donindex',compact($this->table));
            //    return Redirect::to('donation')->withInput();
            return Redirect::route('donation.index')->with('message','Event Deleted');


    }

    //Show Gallery Photos
    public function show($id){

            $event=DB::table($this->table)->where('id',$id)->first();




           return view('donation/donindex');

    }

    public function destroy($id){

        $donevents=DB::table($this->table)->find($id);
        $donevents=DB::table('donevents')->delete($id);
        return Redirect::route('donation.donindex')->with('message','Event Deleted');


    }
}
