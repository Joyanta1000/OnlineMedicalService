<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\city;
use App\Models\country;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = DB::table('cities')
            ->join('countries', 'cities.countries_id', '=', 'countries.id')
            ->select('cities.*', 'countries.country')
            ->get();

        return view('admin.cities',compact('cities'));
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
    public function insert_city(Request $request)
    {
        $rules = [
            'countries_id' => 'required',
            'city' => 'required|string|min:1|max:255|unique:cities,city'
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add_city')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $cities = new city;
                $cities->countries_id = $data['countries_id'];
                $cities->city = $data['city'];
                $cities->save();
                return redirect('add_city')->with('status',"City added successfully");
            }
            catch(Exception $e){
                return redirect('add_city')->with('failed',"operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_info_of_city($id)
    {
        $cities_info = DB::table('cities')
            ->join('countries', 'cities.countries_id', '=', 'countries.id')
            ->select('cities.*', 'countries.country')
            ->where('cities.id', '=', $id)
            ->get();
            //dd($cities_info);
        $countries_info = country::all();

        //dd($countries_info);

        return view('admin.edit_city',compact('cities_info', 'countries_info'));
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
    public function update_cities_info(Request $request, $id)
    {
        $rules = [
            'countries_id' => 'required',
            'city' => 'required|string|min:1|max:255|unique:cities,city',
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
                $cities = city::find($id);
                $cities->countries_id = $data['countries_id'];
                $cities->city = $data['city'];
                $cities->save();
                return redirect()->back()->with('status',"Cities information updated successfully");
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

    public function delete_cities_information($id)
    {
            try{
                city::find($id)->delete();
                return redirect()->back()->with('status',"Cities information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
