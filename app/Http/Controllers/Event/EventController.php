<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\event;//event model
use LaravelFullCalendar\Facades\Calendar;//Calendar class

class EventController extends Controller
{
    //Output Calendar View---------------------------------------
    public function index(){
        $events=event::all();
        $event=[];
        foreach($events as $row){
           $event[]=\Calendar::event(
               $row->title,
               false,
               new \DateTime($row->start_date),
               new \DateTime($row->end_date),
               $row->id,
               [
                   'color'=>$row->color,
                   'url' => "/eventDetails/$row->id",
               ]

           );

        //    $event[] = \Calendar::event(
        //     "Valentine's Day", //event title
        //     true, //full day event?
        //     '2021-03-14', //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
        //     '2021-03-15', //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
        //     1, //optional event ID
        //     [
        //         'url' => '/online-conferences',
        //         //any other full-calendar supported parameters
        //     ]
        // );

        }
        $calendar=\Calendar::addEvents($event);
        return view('event.eventpage',compact('events','calendar'));
     }
     //------------------------------------------------------------

     //output Add Event to Calendar view---------------------------
     public function display(){
         return view('event.addevent');
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
       return redirect('event-calendar')->with('success','Events Added');

     }
     //-------------------------------------------------------------------


     //output display blade-Table view-------------------------------------
     public function show(){
         $events = event::all();
         return view('event.view-event')->with('events',$events);

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
            'start_date'=>'required',
            'end_date'=>'required',
        ]);
        $events=event::find($id);

        $events->title = $request->input('title');
        $events->color = $request->input('color');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();
        return redirect('event-calendar')->with('success','Event Updated');

     }
      //------------------------------------------------------------------------


     //output display blade-Table view Delete Procedure-----------------------
     public function destroy($id){
        $events= event::find($id);
        $events->delete();

        return redirect('event-calendar')->with('success','Event Deleted');

        }

      //---------------------------------------------------------------------

    //onClick event in event calendar-----------------------
    public function moreOnEvent($id){
        return $id;
    }
    //---------------------------------------------------------------------

}
