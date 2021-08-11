<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\medicine_types;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MedicineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicine_types = medicine_types::all();

        return view('admin.medicine_types',compact('medicine_types'));
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

    public function insert_medicine_type(Request $request)
    {
        $rules = [
            'medicine_type' => 'required|string|min:1|max:255|unique:medicine_types,medicine_type',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add_medicine_type')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $medicine_type = new medicine_types;
                $medicine_type->medicine_type = $data['medicine_type'];
                $medicine_type->save();
                return redirect('add_medicine_type')->with('status',"Medicine type added successfully");
            }
            catch(Exception $e){
                return redirect('add_medicine_type')->with('failed',"operation failed");
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

    public function get_info_of_medicine_type($id)
    {
        $medicine_type = medicine_types::find($id);

        return view('admin.edit_medicine_type',compact('medicine_type'));
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

    public function update_medicine_type(Request $request, $id)
    {
        $rules = [
            'medicine_type' => 'required|string|min:1|max:255',
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
                $medicine_type = medicine_types::find($id);
                $medicine_type->medicine_type = $data['medicine_type'];
                $medicine_type->save();
                return redirect()->back()->with('status'," Medicine types information updated successfully");
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

    public function delete_medicine_types_information($id)
    {
            try{
                medicine_types::find($id)->delete();
                return redirect()->back()->with('status',"Medicine types information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
