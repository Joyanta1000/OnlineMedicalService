<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Session;
use DB;
use App\Models\DoctorsSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Session as FacadesSession;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = DoctorsSchedule::where('doctors_id', session()->get('id'))->get();
        return view('doctor.pages.schedules', compact('schedules'));
    }

    public function create()
    {
        
    }

    public function add_doctors_schedule(Request $request)
    {

        $id = FacadesSession::get('id');

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
    }

    public function changeScheduleStatus(Request $request)
    {
        DoctorsSchedule::where('id', $request->schedule_id)->update(['is_active' => $request->is_active]);
    }

    public function show($id)
    {
        $showSchedule = DoctorsSchedule::find($id);

        return view('doctor.pages.show_schedule', compact('showSchedule'));
    }

    public function edit($id)
    {
        $showSchedule = DoctorsSchedule::find($id);

        return view('doctor.pages.edit_schedule', compact('showSchedule'));
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        $showSchedule = DoctorsSchedule::destroy($id);
        return redirect('schedules')->with('status', "Schedule deleted successfully");
    }
}
