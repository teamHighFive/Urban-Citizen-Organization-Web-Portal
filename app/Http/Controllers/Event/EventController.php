<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\event;//event model
use App\Meeting;
use LaravelFullCalendar\Facades\Calendar;//Calendar class
use Illuminate\Support\Facades\Auth;
use Validator;


class EventController extends Controller
{
    //Output Calendar View---------------------------------------
    public function index(){
        $events=event::all();
        $event=[];
        foreach($events as $row){
           $event[]=\Calendar::event(
               $row->title, //event title
               false, //full day event?
               new \DateTime($row->start_date),
               new \DateTime($row->end_date),
               $row->id,
               [
                   'color'=>$row->color,
                   'url' => "/eventDetails/$row->id",
               ]

           );
        }

        //Adding meetings to calendar -By Sandali=======================================
        $meetings=Meeting::all()->where('approval', 1)->where('status',1)->where('display_on_calendar',1);

        foreach($meetings as $meeting){
            $event[]=\Calendar::event(
                $meeting->meeting_name, //event title
                true, //full day event?
                new \DateTime($meeting->date),
                new \DateTime($meeting->date),
                $meeting->meeting_id,
                [
                    'color'=>'#3c5703',
                    'url' => "/meetingDetails/$meeting->meeting_id",
                ]
 
            );
        }
        //Adding meetings to calendar -By Sandali=======================================

        $calendar=\Calendar::addEvents($event);
        return view('event.eventpage',compact('events','calendar'));
     }
     //------------------------------------------------------------

     //output Add Event to Calendar view---------------------------
     public function display(){
        if(Auth::check() && Auth::user()->role_as == 'admin'){
            return view('event.addevent');
        }else{
            return redirect ('/event-calendar')->with('fail','You are not authorized to enter this page.');
        }
        
     }
     //-------------------------------------------------------------


     //Add Event to Calendar view Add Event button Store procedure---
     public function store(Request $request){
       $this->validate($request,[
           'title'=>'required',
           'color'=>'required',
           'description'=>'required',
           'location'=>'required',
           'start_date'=>'required',
           'end_date'=>'required',
       ]);
       $events=new event;
       $events->title = $request->input('title');
       $events->description = $request->input('description');
       $events->location = $request->input('location');
       $events->color = $request->input('color');
       $events->start_date = $request->input('start_date');
       $events->end_date = $request->input('end_date');

       $events->save();
       return redirect('event-calendar')->with('success','Event Added Suceessfully!!!');

     }
     //-------------------------------------------------------------------


     //output display blade-Table view-------------------------------------
     public function show(){
        if(Auth::check() && Auth::user()->role_as == 'admin'){
            $events = event::all();
            return view('event.view-event')->with('events',$events);
   
        }else{
            return redirect ('/event-calendar')->with('fail','You are not authorized to enter this page.');
        }

       

     }
     //---------------------------------------------------------------------

     //output editform view-Update your Data view---------------------------------
     public function edit($id){
           $events= event::find($id);
           return view('event.editEvent',compact('events','id'));

     }
     //--------------------------------------------------------------------


     //output Update Event Data form updtade pocedure--------------------------
     public function update(Request $request, $id){
        $this->validate($request,[
            'title'=>'required',
            'color'=>'required',
            'description'=>'required',
            'location'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ]);
        $events=event::find($id);
        $events->title = $request->input('title');
        $events->description = $request->input('description');
        $events->location = $request->input('location');
        $events->color = $request->input('color');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');
 
        $events->save();

        return redirect('event-calendar')->with('success','Event Updated Successfully!!!');

     }
      //------------------------------------------------------------------------


     //output display blade-Table view Delete Procedure-----------------------
     public function destroy($id){
        $events= event::find($id);
        $events->delete();

        return redirect('event-calendar')->with('success','Event Deleted Successfully!!!');

        }

      //---------------------------------------------------------------------

    //onClick event in event calendar-----------------------
    public function moreOnEvent($id){
        $event = event::find($id);
        return view('event.eventDetails')->with('event', $event);
    }
    //---------------------------------------------------------------------

    //Adding meetings to calendar -By Sandali=======================================
    //onClick meeting in event calendar-----------------------
    public function moreOnMeeting($id){
        $meeting = Meeting::find($id);
        return view('event.meetingDetails')->with('meeting', $meeting);
    }
    //---------------------------------------------------------------------
    //Adding meetings to calendar -By Sandali=======================================

}
