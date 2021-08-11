<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\country;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = country::all();

        return view('admin.countries',compact('countries'));
    }

    public function countries_for_cities()
    {
        $countries = country::all();

        return view('admin.add_city',compact('countries'));
    }

    // public function get_info_of_country_for_city()
    // {
    //     $countries_info = country::all();

    //     //dd($countries_info);

    //     return view('admin.edit_city',compact('countries_info'));
    // }

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
    public function insert_country(Request $request)
    {
        $rules = [
            'country' => 'required|string|min:1|max:255|unique:countries,country',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add_country')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $countries = new country;
                $countries->country = $data['country'];
                $countries->save();
                return redirect('add_country')->with('status',"Country added successfully");
            }
            catch(Exception $e){
                return redirect('add_country')->with('failed',"operation failed");
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
    public function get_info_of_country($id)
    {
        $countries_info = country::find($id);

        return view('admin.edit_country',compact('countries_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_countries_info(Request $request, $id)
    {
        $rules = [
            'country' => 'required|string|min:1|max:255|unique:countries,country',
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
                $countries = country::find($id);
                $countries->country = $data['country'];
                $countries->save();
                return redirect()->back()->with('status',"Countries information updated successfully");
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

    public function delete_countries_information($id)
    {
            try{
                country::find($id)->delete();
                return redirect()->back()->with('status',"Countries information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
