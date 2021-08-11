<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\marital_status;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MaritalStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marital_statuses = marital_status::all();

        return view('admin.marital_statuses',compact('marital_statuses'));
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

    public function insert_marital_status(Request $request)
    {
        $rules = [
            'marital_status' => 'required|string|min:1|max:255|unique:marital_statuses,marital_status',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add_marital_status')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $marital_status = new marital_status;
                $marital_status->marital_status = $data['marital_status'];
                $marital_status->save();
                return redirect('add_marital_status')->with('status',"Marital status added successfully");
            }
            catch(Exception $e){
                return redirect('add_marital_status')->with('failed',"operation failed");
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

    public function get_info_of_marital_status($id)
    {
        $marital_statuses = marital_status::find($id);

        return view('admin.edit_marital_status',compact('marital_statuses'));
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

    public function update_marital_status(Request $request, $id)
    {
        $rules = [
            'marital_status' => 'required|string|min:1|max:255',
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
                $marital_status = marital_status::find($id);
                $marital_status->marital_status = $data['marital_status'];
                $marital_status->save();
                return redirect()->back()->with('status'," Marital statuses information updated successfully");
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

    public function delete_marital_statuses_information($id)
    {
            try{
                marital_status::find($id)->delete();
                return redirect()->back()->with('status',"Marital statuses information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }

}
