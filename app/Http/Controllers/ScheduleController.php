<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;

use Session;
use DB;
use App\Models\DoctorsSchedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_doctors_schedule(Request $request)
    {
        $id = Session::get('id');
        $data = $request->input();

        $Schedule_Arr = array("sat_time_1"=>$request->sat_time_1, "sat_time_2"=>$request->sat_time_2, "sun_time_1"=>$request->sun_time_1, "sun_time_2"=>$request->sun_time_2, "mon_time_1"=>$request->mon_time_1, "mon_time_2"=>$request->mon_time_2, "tue_time_1"=>$request->tue_time_1, "tue_time_2"=>$request->tue_time_2, "wed_time_1"=>$request->wed_time_1, "wed_time_2"=>$request->wed_time_2, "thu_time_1"=>$request->thu_time_1, "thu_time_2"=>$request->thu_time_2, "fri_time_1"=>$request->fri_time_1, "fri_time_2"=>$request->fri_time_2);

 $Doctors_Schedule = json_encode($Schedule_Arr);

                $Schedule = new DoctorsSchedule;
                $Schedule->doctors_id = $id;
                //$Schedule->doctors_id = 1;
                $Schedule->schedule = $Doctors_Schedule;
                $Schedule->save();
    }

    public function add_doctors_schedules()
    {
        $id = session()->get('id');
        return response()->json([
                    'data' => $id,
                    
                  ], 201);
         //print_r();       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
