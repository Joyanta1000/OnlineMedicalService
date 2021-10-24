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

        $Schedule_Arr = array("Saturday From" => $request->sat_time_1, "Saturday To" => $request->sat_time_2, "Sunday From" => $request->sun_time_1, "Sunday To" => $request->sun_time_2, "Monday From" => $request->mon_time_1, "Monday To" => $request->mon_time_2, "Tuesday From" => $request->tue_time_1, "Tuesday To" => $request->tue_time_2, "Wednesday From" => $request->wed_time_1, "Wednesday To" => $request->wed_time_2, "Thursday From" => $request->thu_time_1, "Thursday To" => $request->thu_time_2, "Friday From" => $request->fri_time_1, "Friday To" => $request->fri_time_2);

        $Doctors_Schedule = json_encode($Schedule_Arr);

        $checkDoctorsid = DoctorsSchedule::where('doctors_id', $id)->first();

        if($checkDoctorsid){
            return redirect('add_schedule')->with('failed', "Schedule created before");
        }
        else{
            $Schedule = new DoctorsSchedule;
            $Schedule->doctors_id = $id;
            //$Schedule->doctors_id = 1;
            $Schedule->schedule = $Doctors_Schedule;
            if ($Schedule->save()) {
                return redirect('add_schedule')->with('status', "Schedule added successfully");
            } else {
                return redirect('add_schedule')->with('failed', "Schedule not added");
            }
        }
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
