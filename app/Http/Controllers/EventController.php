<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function index(){
        $event = DB::table('events')->get(['id', 'event_name']);
        return response()->json([
            'status'=>200,
            'data'=>$event
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_name'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        }

        Event::create([
            'event_name'=>$request->event_name
        ]);
        return response()->json([
            'status'=>200,
            'message'=>'success input event'
        ]);
    }

    public function getEventCompany(){
        $eventC = DB::table('events')
                        ->join('companies', 'events.id', '=', 'companies.event_id')
                        ->select('event_name', 'company_name')
                        ->get();
        return response()->json([
            'data'=>$eventC
        ]);
    }
}
