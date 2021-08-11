<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\specialities_of_doctor;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = specialities_of_doctor::all();

        return view('admin.specialities',compact('specialities'));
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
    public function store(Request $request)
    {
        //
    }

    public function insert_speciality(Request $request)
    {
        $rules = [
            'speciality' => 'required|string|min:1|max:255|unique:specialities_of_doctors,speciality',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add_specialities_of_doctor')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $specialities_of_doctor = new specialities_of_doctor;
                $specialities_of_doctor->speciality = $data['speciality'];
                $specialities_of_doctor->save();
                return redirect('add_specialities_of_doctor')->with('status',"Doctors speciality added successfully");
            }
            catch(Exception $e){
                return redirect('add_specialities_of_doctor')->with('failed',"operation failed");
            }
        }
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

    public function get_info_of_speciality($id)
    {
        $specialities = specialities_of_doctor::find($id);

        return view('admin.edit_speciality',compact('specialities'));
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

    public function update_specialities_info(Request $request, $id)
    {
        $rules = [
            'speciality' => 'required|string|min:1|max:255',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $specialities = specialities_of_doctor::find($id);
                $specialities->speciality = $data['speciality'];
                $specialities->save();
                return redirect()->back()->with('status'," Doctors specialities information updated successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
        }
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

    public function delete_specialities_information($id)
    {
            try{
                specialities_of_doctor::find($id)->delete();
                return redirect()->back()->with('status',"Specialities information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }

}
