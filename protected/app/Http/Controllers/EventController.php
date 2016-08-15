<?php

namespace App\Http\Controllers;

use App\Http\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller {

    public function index(){
        $events  = Event::all();
        
        $res = new \StdClass();
        $res->success = true;
        $res->data = $events;

        return response()->json($res);
    }

    public function getEvent($id){
        $event  = Event::find($id);
        $res = new \StdClass();


        if ($event !== null){
            $res->success = true;
            $res->data = $event;
        } else {
            $res->success = false;
            $res->message = "Event not found!";
        }

        return response()->json($res);
    }

    public function saveEvent(Request $request){
        $event = Event::create($request->all());
        $res = new \StdClass();

        if ($event !== null) {
            $res->success = true;
            $res->message = "Event has been created";
            $res->data = $event;
        } else {
            $res->success = false;
            $res->message = "Event failed to be created";
        }

        return response()->json($res);
    }

    public function updateEvent(Request $request, $id){
        $event  = Event::find($id);
        $res = new \StdClass();

        if ($event !== null) {
            $event->name = $request->input('name') !== null || $request->input('name') === "" ? $request->input('name') : $event->name;
            $event->description = $request->input('description') !== null || $request->input('description') === "" ? $request->input('description') : $event->description;
            $event->date = $request->input('date') !== null || $request->input('date') === "" ? $request->input('date') : $event->date;
            $event->save();
            
            $res->success = true;
            $res->data = $event;
            $res->message = "Event has been updated";
        } else {
            $res->success = false;
            $res->message = "Event not found!";
        }

        return response()->json($res);
    }

    public function deleteEvent($id){
        $event = Event::find($id);
        $res = new \StdClass();

        if ($event !== null){
            $event->delete();
            $res->success = true;
            $res->message = "Event has been removed";
        } else {
            $res->success = false;
            $res->message = "Event not found!";
        }

        return response()->json($res);
    }

}