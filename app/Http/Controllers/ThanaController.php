<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\city;
use App\Models\country;
use App\Models\thana;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ThanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thanas = DB::table('thanas')
            ->join('countries', 'thanas.countries_id', '=', 'countries.id')
            ->join('cities', 'thanas.cities_id', '=', 'cities.id')
            ->select('thanas.*', 'countries.country', 'cities.city')
            ->get();

        return view('admin.thanas',compact('thanas'));
    }

    public function countries_for_thana()
    {
        $countries = country::all();

        return view('admin.add_thana',compact('countries'));
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

    public function insert_thana(Request $request)
    {
        $rules = [
            'countries_id' => 'required',
            'cities_id' => 'required',
            'thana' => 'required|string|min:1|max:255|unique:thanas,thana'
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add_thana')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $thanas = new thana;
                $thanas->countries_id = $data['countries_id'];
                $thanas->cities_id = $data['cities_id'];
                $thanas->thana = $data['thana'];
                $thanas->save();
                return redirect('add_thana')->with('status',"Thana or Police Station added successfully");
            }
            catch(Exception $e){
                return redirect('add_thana')->with('failed',"operation failed");
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

    public function cities_for_thana($id)
    {

        $cities_info = DB::table('cities')
            //->join('countries', 'cities.countries_id', '=', 'countries.id')
            ->select('cities.*')
            ->where('cities.countries_id', '=', $id)
            ->get();
            //dd($cities_info);
        //$countries_info = country::all();

        //dd($countries_info);

            //dd($cities_info);
            $response = array(
                'data' => $cities_info,
            );
            echo json_encode($response);
            //dd($c);

        //return view('admin.add_state_or_district',compact('response'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function get_info_of_thana($id)
    {
        $thanas_info = DB::table('thanas')
            ->join('countries', 'thanas.countries_id', '=', 'countries.id')
            ->join('cities', 'thanas.cities_id', '=', 'cities.id')
            ->select('thanas.*', 'countries.country', 'cities.city')
            ->where('thanas.id', '=', $id)
            ->get();
            //dd($cities_info);
        $countries_info = country::all();

        //dd($countries_info);

        return view('admin.edit_thana',compact('thanas_info', 'countries_info'));
    }

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

    public function update_thanas_info(Request $request, $id)
    {
        $rules = [
            'countries_id' => 'required',
            'cities_id' => 'required',
            'thana' => 'required|string|min:1|max:255',
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
                $thanas = thana::find($id);
                $thanas->countries_id = $data['countries_id'];
                $thanas->cities_id = $data['cities_id'];
                $thanas->thana = $data['thana'];
                $thanas->save();
                return redirect()->back()->with('status',"Thana or police stations information updated successfully");
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

    public function delete_thanas_information($id)
    {
            try{
                thana::find($id)->delete();
                return redirect()->back()->with('status',"Thana or police stations information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }

}
