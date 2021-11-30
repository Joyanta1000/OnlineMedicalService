<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\city;
use App\Models\country;
use App\Models\thana;
use App\Models\area;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = DB::table('areas')
            ->join('countries', 'areas.countries_id', '=', 'countries.id')
            ->join('cities', 'areas.cities_id', '=', 'cities.id')
            ->join('thanas', 'areas.thanas_id', '=', 'thanas.id')
            ->select('areas.*', 'countries.country', 'cities.city', 'thanas.thana')
            ->get();

        return view('admin.areas', compact('areas'));
    }

    public function countries_for_area()
    {
        $countries = country::all();

        return view('admin.add_area', compact('countries'));
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

    public function thanas_for_area($id)
    {

        $thanas_info = DB::table('thanas')
            //->join('countries', 'cities.countries_id', '=', 'countries.id')
            ->select('thanas.*')
            ->where('thanas.cities_id', '=', $id)
            ->get();
        //dd($cities_info);
        //$countries_info = country::all();

        //dd($countries_info);

        //dd($cities_info);
        $response = array(
            'data' => $thanas_info,
        );
        echo json_encode($response);
        //dd($c);

        //return view('admin.add_state_or_district',compact('response'));
    }

    public function areas_for_address($id)
    {

        $areas_info = DB::table('areas')
            //->join('countries', 'cities.countries_id', '=', 'countries.id')
            ->select('areas.*')
            ->where('areas.thanas_id', '=', $id)
            ->get();
        //dd($cities_info);
        //$countries_info = country::all();

        //dd($countries_info);

        //dd($cities_info);
        $response = array(
            'data' => $areas_info,
        );
        echo json_encode($response);
        //dd($c);

        //return view('admin.add_state_or_district',compact('response'));
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

    public function insert_area(Request $request)
    {
        $rules = [
            'countries_id' => 'required',
            'cities_id' => 'required',
            'thanas_id' => 'required',
            'area' => 'required|string|min:1|max:255|unique:areas,area'
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('add_area')
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                $thanas = new area;
                $thanas->countries_id = $data['countries_id'];
                $thanas->cities_id = $data['cities_id'];
                $thanas->thanas_id = $data['thanas_id'];
                $thanas->area = $data['area'];
                $thanas->save();
                return redirect('add_area')->with('status', "Area added successfully");
            } catch (Exception $e) {
                return redirect('add_area')->with('failed', "operation failed");
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

    public function get_info_of_area($id)
    {
        $areas_info = DB::table('areas')
            ->join('countries', 'areas.countries_id', '=', 'countries.id')
            ->join('cities', 'areas.cities_id', '=', 'cities.id')
            ->join('thanas', 'areas.thanas_id', '=', 'thanas.id')
            ->select('areas.*', 'countries.country', 'cities.city', 'thanas.thana')
            ->where('areas.id', '=', $id)
            ->get();
        //dd($areas_info);
        $countries_info = country::all();

        //dd($countries_info);

        return view('admin.edit_area', compact('areas_info', 'countries_info'));
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

    public function update_areas_info(Request $request, $id)
    {
        // dd($request->all());
        $rules = [
            // 'countries_id' => 'required',
            // 'cities_id' => 'required',
            // 'thanas_id' => 'required',
            'area' => 'required|string|min:1|max:255',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                $areas = area::find($id);
                // $areas->countries_id = $data['countries_id'];
                // $areas->cities_id = $data['cities_id'];
                // $areas->thanas_id = $data['thanas_id'];
                $areas->area = $data['area'];
                $areas->save();
                return redirect()->back()->with('status', "Areas information updated successfully");
            } catch (Exception $e) {
                return redirect()->back()->with('failed', "operation failed");
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

    public function delete_areas_information($id)
    {
        try {
            area::find($id)->delete();
            return redirect()->back()->with('status', "Areas information deleted successfully");
        } catch (Exception $e) {
            return redirect()->back()->with('failed', "operation failed");
        }
    }
}
