<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Poll;
use App\Option;
use App\Vote;
use App\User;




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
            'op1'=>'required',
            'op2'=>'required',
            'end_date'=>'required'
          
        ]);
            

            $poll = new Poll();
            $poll->descrition = $request->input('Question');
            $poll->end_date = $request->input('end_date');
            $poll->is_anonymous = $request->anonymous != null ? true : false;
            $poll->save();

            
            for($x = 1; $x <= $request->poolCount;$x++){
                $optionOne = new Option();
                $optionOne->option_name = $request["op$x"];
                $optionOne->poll_id = $poll->id;
                $optionOne->votes = 0;
                $optionOne->save();
            }

            

            // $optionTwo = new Option();
            // $optionTwo->option_name = $request->op2;
            // $optionTwo->poll_id = $poll->id;
            // $optionTwo->votes = 0;
            // $optionTwo->save();

     return redirect('pollhome')->with('flashMessage','You have created poll successfully!!! ');
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

        $no_of_votes = $options->sum('votes') == 0 ? 1:$options->sum('votes');

        return view('poll.result',['question'=>$question,'options'=>$options,'no_of_votes'=>$no_of_votes]);
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
            'end_date'=>'required'
           
        ]);
        $questions=Poll::find($id);
       
        $questions->descrition=$request->input('Question');
        $questions->end_date=$request->input('end_date');
        $questions->is_anonymous = $request->anonymous != null ? true : false;
     
        $questions->save();
   

    //    foreach($request->input('option') as $key => $value) {
    //        $rules["option.{$key}"] = 'required';
    //    }

    //     $validator = Validator::make($request->all(), $rules);
    //     $optionidone=DB::table('options')->where('poll_id',$id)->orderBy('id','asc')->min('id');//get the optionid1

    //    if ($validator->passes()) {
    //       foreach($request->input('option') as $key => $value) {
    //          DB::table('options')->where('id',$optionidone) ->update(['option_name'=>$value,'poll_id'=>$id,'votes'=>0]);
    //         $optionidone++;
    //        }
      
    //     }
      
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


    public function viewvoters($poll_id, $option_id){
        $poll = Poll::find($poll_id);
        $option = Option::find($option_id);

        $votes = Vote::all()->where('poll_id',$poll_id)->where('option_id',$option_id)->where('has_voted',1);

        $voters = [];
        foreach($votes as $vote){
            $user = User::find($vote->user_id);
            if($user == null){
                // $user = new User();
                $no_user = new User();
                $no_user->avatar = '/images/unregisteredUser.jpg';
                $no_user->fname = 'User';
                $no_user->mname = 'not';
                $no_user->lname = 'available';
                array_push($voters, $no_user);

            }else{
                array_push($voters, $user);
            }
            
        }
             
        return view('poll.viewvoters')->with('poll', $poll)->with('option', $option)->with('voters', $voters);
    }

  

}
