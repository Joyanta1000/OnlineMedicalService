<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\problems;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems = problems::all();

        return view('admin.problems',compact('problems'));
    }

    public function change_status_of_problem(Request $request)
    {
        
                $problem = problems::find($request->problem_id);

        $problem->is_active = $request->is_active;

        $problem->save();

  

        return response()->json(['success'=>'Status changed successfully.']);

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
    public function insert_problem(Request $request)
    {
        $rules = [
            'problems_name' => 'required|string|min:3|max:255|unique:problems,problems_name',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add_problem')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $problem = new problems;
                $problem->problems_name = $data['problems_name'];
                $problem->is_active = 1;
                $problem->save();
                return redirect('add_problem')->with('status',"Problem added successfully");
            }
            catch(Exception $e){
                return redirect('add_problem')->with('failed',"operation failed");
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
    public function get_info_of_problem($id)
    {
        $problems_info = problems::find($id);

        return view('admin.edit_problems_info',compact('problems_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_problems_info(Request $request, $id)
    {
        $rules = [
            'problems_name' => 'required|string|min:3|max:255|unique:problems,problems_name',
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
                $problem = problems::find($id);
                $problem->problems_name = $data['problems_name'];
                $problem->save();
                return redirect()->back()->with('status',"Problems information updated successfully");
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
    public function delete_problems_info($id)
    {
            try{
                problems::find($id)->delete();
                return redirect()->back()->with('status',"Problems information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
