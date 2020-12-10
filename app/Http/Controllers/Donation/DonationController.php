<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DonationEvent;

class DonationController extends Controller{
 

    // --------------------------------------------------------------------------------------------------
    // Create a new controller instance.
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index','show']]);
    }

    // --------------------------------------------------------------------------------------------------
    // Display a listing of the Donation event
    // --------------------------------------------------------------------------------------------------

    public function index(){

        //Get all Donation Events
        $donevents=DonationEvent::get();
        $donevents=DonationEvent::simplePaginate(3);



        //render view
        return view('donation.index')->with('donevents', $donevents);
       
}

    // --------------------------------------------------------------------------------------------------
    // Show the form for creating a new Album
    // --------------------------------------------------------------------------------------------------
   
    public function create(){
        return view('donation.createdonevent');

}
    // --------------------------------------------------------------------------------------------------
    // Show the form for Donation
    // --------------------------------------------------------------------------------------------------

    public function donate(){
        return view('donation.form');

}

    // --------------------------------------------------------------------------------------------------
    // Store a newly created Album in storage.
    // --------------------------------------------------------------------------------------------------
    public function store(Request  $request){

        //validate inputs
        $this->validate($request,[
            'name'=>'required|max:100',
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
            $path-> move(public_path('/donation-resourses/events/images'),$fileNameToStore);
        }

        else{
            $fileNameToStore='noimage.jpg';
            
        }

        //insert into datbase
        $donevents=new DonationEvent;
        $donevents->name = $request->input('name');
        $donevents->description = $request->input('description');
        $donevents->coverimage = $fileNameToStore;
        $donevents->save();
        
        
        //Rederect
        return redirect('/donation')->with('success','Donation Event created.');

}

    // --------------------------------------------------------------------------------------------------
    // Display the specified Donation event
    // --------------------------------------------------------------------------------------------------
    
    public function show($id){
            
        //Get Donation event
        
        $donevents = DonationEvent::find($id)->last();
        

        //return view
        return view('donation.show')->with('donevents', $donevents);;

        
}
    // --------------------------------------------------------------------------------------------------
    // Show the form for editing the specified Donation event
    // --------------------------------------------------------------------------------------------------
    public function edit($id){
        //TODO edit function
        $donevents=DonationEvent::find($id);
        return view('donation.edit')->with('donevent',$donevents);
    }


    // --------------------------------------------------------------------------------------------------
    // Remove the specified resource from Album
    // --------------------------------------------------------------------------------------------------

public function destroy($id){

    $donevents=DonationEvent::find($id);
    $donevents->delete($id);
    return redirect('/donation')->with('success','Donation event Deleted');

}

public function update(Request $request, $id){
     //validate inputs
     $this->validate($request,[
        'name'=>'required|max:100',
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
        $path-> move(public_path('/donation-resourses/events/images'),$fileNameToStore);
    }

    else{
        $fileNameToStore='noimage.jpg';
        
    }

    //insert into datbase
    $donevents=DonationEvent::find($id);
    $donevents->name = $request->input('name');
    $donevents->description = $request->input('description');
    $donevents->coverimage = $fileNameToStore;
    $donevents->save();
    
    
    //Rederect
    return redirect('/donation')->with('success','Donation Event Updated.');
}

   

    // //Show Gallery Photos
    // public function show($id){

    //         $event=DonationEvent::where('id',$id)->first();




    //        return view('donation/donindex');

    // }

   
}
