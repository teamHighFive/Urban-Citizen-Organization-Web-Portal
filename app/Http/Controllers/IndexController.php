<?php


namespace App\Http\Controllers;


use App\Repositories\Events;

class IndexController extends Controller
{

    public function index(Events $eventsRepository) {

        $events = $eventsRepository->get();

        return view('index.index')->with(compact(['events']));

    }
   
      
}