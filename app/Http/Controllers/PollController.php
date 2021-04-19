<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Poll;
use App\Option;




class PollController extends Controller
{
    public function pollHome(){
        return view('poll.pollhome ');
    }
//--------------------------enter to create poll form---------------------------------------//
    
    public function createPollForm(){
        
        if(Auth::check() && Auth::user()->role_as == 'admin'){
            return view('poll.createpoll');
        }else{
            return redirect ('pollhome')->with('flashMessageProblem','You are not authorized to enter this page.');
        }
    
    }
    
//--------------------------save the data entered create poll form---------------------------------------//
    public function createPoll(Request $request){
        $this->validate($request,[
            'Question'=>'required',
            'Optionone'=>'required',
            'Optiontwo'=>'required',
            'end_date'=>'required',
        ]);
       
            $Question=$request->input('Question');
            $end_date=$request->input('end_date');
        
                
            $id=DB::table('polls')->insertGetId(['descrition'=>$Question,'end_date'=> $end_date]);
            
            $Optionone=$request->Optionone;
            DB::table('options')->insert( ['option_name'=>$Optionone,'poll_id'=>$id,'votes'=>0]);
        
            $Optiontwo=$request->Optiontwo;
            DB::table('options')->insert( ['option_name'=>$Optiontwo,'poll_id'=>$id,'votes'=>0]);

     return redirect('create-poll-form')->with('flashMessage','You have created poll successfully!!! Now you can add the more options.');
    }


//--------------------------AddMoreOptions view and submit--------------------------------------- //  
    
    public function addMore()
    {
        return view("poll.addmoreoptions");
    }


    public function addMorePost(Request $request)
    {
  
        $rules = [];
        //validate option one by one
        foreach($request->input('option') as $key => $value) {
            $rules["option.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        $id=DB::table('polls')->max('id');

      
        if ($validator->passes()) { //check all the option passes the validate
                  
            foreach($request->input('option') as $key => $value) {
                DB::table('options')->insert( ['option_name'=> $value,'poll_id'=>$id,'votes'=>0]);
               
            }
            return response()->json(['success'=>'done']);
          
           
        }

        return response()->json(['error'=>$validator->errors()->all()]);
      
    }




    //--------------------------casting vote--------------------------------------------------------------   




    public function castVote(Request $request,$id){
       
        //get the option user has voted      
        $optionid=$request->input('optionid');
        $user_id=Auth::user()->id;
        //increase number of votes
        DB::table('options')->where('id',$optionid)->update(['votes'=>DB::raw("votes+1")]);
        //user who has voted save in votetable
        DB::table('votes')->insert( ['poll_id'=>$id,'option_id'=>$optionid,'user_id'=>$user_id,'has_voted'=>1]);
          
          
          
        
      return redirect('pollhome')->with('flashMessage','You have voted successfully!!!'); 
  
       
    }

   

    //--------------------------poll result view------------------------------------------------------------
    public function result($id){
            
        $question=Poll::find($id);
        $options=DB::table('options')->where('poll_id',$id)->get();
      
        
        return view('poll.result',['question'=>$question,'options'=>$options]);
    }

    //--------------------------poll table view------------------------------------------------------------
    public function showtable(){
        if(Auth::check() && Auth::user()->role_as == 'admin'){
            $questions=DB::table('polls')->get();//get the array of questions
            return view('poll.polltable',['questions'=>$questions]);
        }else{
            return redirect ('pollhome')->with('flashMessageProblem','You are not authorized to enter this page.');
        }
        
    } 

    //--------------------------edit poll view------------------------------------------------------------
        
    public function edit($id){
           
        $questions=Poll::find($id);//find the pass id record in poll
        $options=DB::table('options')->where('poll_id',$id)->get();//get array of records which belong to pass poll id
             
       return view('poll.editpoll',compact('questions','id','options'));

       
    }
   
    //--------------------------update poll ------------------------------------------------------------

    public function update(Request $request, $id){
        $this->validate($request,[
            'Question'=>'required',
            'end_date'=>'required',
        ]);
        $questions=Poll::find($id);
       
        $questions->descrition=$request->input('Question');
        $questions->end_date=$request->input('end_date');
     
        $questions->save();
   

       foreach($request->input('option') as $key => $value) {
           $rules["option.{$key}"] = 'required';
       }

        $validator = Validator::make($request->all(), $rules);
        $optionidone=DB::table('options')->where('poll_id',$id)->orderBy('id','asc')->min('id');//get the optionid1

       if ($validator->passes()) {
          foreach($request->input('option') as $key => $value) {
             DB::table('options')->where('id',$optionidone) ->update(['option_name'=>$value,'poll_id'=>$id,'votes'=>0]);
            $optionidone++;
           }
      
        }
      
        return redirect('pollhome')->with('flashMessage','Poll updated successfully!!!');
     
    }

    
   //--------------------------Delete poll -----------------------------------------------------------

    public function destroy($id){
        $questions=Poll::find($id);
        $questions->votes()->delete();

        $questions->options()->delete();
       
        $questions->delete();

        return redirect('pollhome')->with('flashMessage','Poll Deleted successfully!!!');

    }

    public function showvotetable(){
       
            $questions=DB::table('polls')->get();//get the array of questions
            return view('poll.votetable',['questions'=>$questions]);
        

    }

    public function viewvotingpage($id){
           
        
        $end_date=DB::table('polls')->where('id',$id)->value('end_date');
        $has_voted_value=DB::table('votes')->where('user_id',Auth::user()->id)->where('poll_id',$id)->value('has_voted');
       
       
        if(!Auth::check()){
            return redirect('register');
           
        }else if(now()>$end_date){
           
            return redirect('pollhome')->with('flashMessageProblem','You can no loger vote. Poll is closed.');
         
      
            }else if($has_voted_value==0){
        $question=Poll::find($id);//find the pass id record in poll
        $options=DB::table('options')->where('poll_id',$id)->get();//get array of records which belong to pass poll id
           
            return view('poll.voting',['question'=>$question,'options'=>$options,'id'=>$id]);
        }else{
        //if user has already voted
        return redirect('pollhome')->with('flashMessageProblem','You have already voted');
        }
       
    }

  

}
