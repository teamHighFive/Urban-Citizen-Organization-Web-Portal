<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DonationEvent;
use DB;

class DonationEventController extends Controller{
 

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
    
        // $donevents=DonationEvent::all();
        $donevents = DB::table('donation_events')->where('status', 2)->paginate(6);



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
    // Store a newly created Donation Event in storage.
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
        return redirect('/donation')->with('message','Donation Event created.');
        

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
        
        $donevents=DonationEvent::find($id);
        return view('donation.edit')->with('donevent',$donevents);
    }


public function update(Request $request, $id){
     //validate inputs
     $this->validate($request,[
        'name'=>'required|max:100',
        'description'=>'required|max:255',
        'coverimage'=>'image|mimes:jpeg,jpg|max:2048',
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

    //insert into datbase
    $donevents=DonationEvent::find($id);
    if(is_null($donevents)){
        abort(404);
      }

    $donevents->name = $request->input('name');
    $donevents->description = $request->input('description');
    if($request->hasFile('coverimage')){
        $donevents->coverimage = $fileNameToStore;
    }
    $donevents->save();

    
    
    //Rederect
    return redirect('/donations/showAllDonationEvents')->with('success','Donation Event Updated.');
}

   

   
    // --------------------------------------------------------------------------------------------------
    // Remove the specified resource from Donation
    // --------------------------------------------------------------------------------------------------
    public function destroy($id){

        $donevents=DonationEvent::find($id);
        $donevents->status = 0;
        $donevents->update();
        return redirect('/donations/showAllDonationEvents')->with('success','Donation event  Deleted');

    }

    // --------------------------------------------------------------------------------------------------
    // Finish donation event
    // --------------------------------------------------------------------------------------------------
    public function finish($id){

        $donevents=DonationEvent::find($id);
        $donevents->status = 1;
        $donevents->update();
        return redirect('/donations/showAllDonationEvents')->with('success','Donation event  finished');

    }

    // --------------------------------------------------------------------------------------------------
    // Show Donation Events
    // --------------------------------------------------------------------------------------------------
    public function showAllDonationEvents()
    {
        $donevents = DonationEvent::all()->sortByDesc('status');
        return view('donation.showAllDonations')->with('donevents', $donevents);
    }
   
}
