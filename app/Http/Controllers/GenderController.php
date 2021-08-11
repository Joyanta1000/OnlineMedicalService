<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\gender;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = gender::all();

        return view('admin.genders',compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function insert(){
        // $urlData = getURLList();
        // return view('add_gender');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert_gender(Request $request)
    {
        $rules = [
            'gender' => 'required|string|min:3|max:255|unique:genders,gender',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add_gender')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $genders = new gender;
                $genders->gender = $data['gender'];
                $genders->save();
                return redirect('add_gender')->with('status',"Gender added successfully");
            }
            catch(Exception $e){
                return redirect('add_gender')->with('failed',"operation failed");
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
    public function get_info_of_gender($id)
    {
        $genders_info = gender::find($id);

        return view('admin.edit_gender',compact('genders_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_genders_info(Request $request, $id)
    {
        $rules = [
            'gender' => 'required|string|min:3|max:255|unique:genders,gender',
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
                $genders = gender::find($id);
                $genders->gender = $data['gender'];
                $genders->save();
                return redirect()->back()->with('status',"Genders information updated successfully");
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

    public function delete_genders_information($id)
    {
            try{
                gender::find($id)->delete();
                return redirect()->back()->with('status',"Genders information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
