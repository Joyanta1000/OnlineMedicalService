<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\medicine_types;
use App\Models\medicines;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
//use Redirect,Response;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
            $medicines = DB::table('medicines')
            ->join('medicine_types', 'medicines.medicines_type_id', '=', 'medicine_types.id')
            ->select('medicines.*', 'medicine_types.medicine_type')
            ->get();

            //return json_encode($medicines);
            //return json_encode(array('data'=>$medicines));

            // $response = array(
            //     'data' => $medicines,
            // );
            // echo json_encode($response);

        return view('pharmacist.medicines',compact('medicines'));
    }

    public function changeStatus(Request $request)
    {
        
                $medicines = medicines::find($request->medicine_id);

        $medicines->is_active = $request->is_active;

        $medicines->save();

  

        return response()->json(['success'=>'Status changed successfully.']);

    }

    public function medicines_info()
    {
        
    }

    public function medicine_type_for_medicine()
    {
        $medicine_types = medicine_types::all();

        return view('pharmacist.add_medicine',compact('medicine_types'));
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

    public function insert_medicine(Request $request)
    {
        $rules = [
            'medicines_type_id' => 'required',
            'medicines_name' => 'required|string|min:1|max:255',
            'company' => 'required'
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add_medicine')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $medicines = new medicines;
                $medicines->medicines_type_id = $data['medicines_type_id'];
                $medicines->medicines_name = $data['medicines_name'];
                $medicines->company = $data['company'];
                $medicines->ingredients = $data['ingredients'];
                $medicines->save();
                return redirect('add_medicine')->with('status',"Medicine added successfully");
            }
            catch(Exception $e){
                return redirect('add_medicine')->with('failed',"operation failed");
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

    public function get_info_of_medicine($id)
    {
        $medicines_info = DB::table('medicines')
            ->join('medicine_types', 'medicines.medicines_type_id', '=', 'medicine_types.id')
            ->select('medicines.*', 'medicine_types.medicine_type')
            ->where('medicines.id', '=', $id)
            ->get();
            //dd($cities_info);
        $medicine_types_info = medicine_types::all();

        //dd($countries_info);

        return view('pharmacist.edit_medicines_info',compact('medicines_info', 'medicine_types_info'));
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

    public function update_medicines_info(Request $request, $id)
    {
        $rules = [
            'medicines_type_id' => 'required',
            'medicines_name' => 'required',
            'company' => 'required',
            'ingredients' => 'required'
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
                $medicines_info = medicines::find($id);
                $medicines_info->medicines_type_id = $data['medicines_type_id'];
                $medicines_info->medicines_name = $data['medicines_name'];
                $medicines_info->company = $data['company'];
                $medicines_info->ingredients = $data['ingredients'];
                $medicines_info->save();
                return redirect()->back()->with('status'," Medicines information updated successfully");
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

    public function delete_medicines_info($id)
    {
            try{
                medicines::find($id)->delete();
                return redirect()->back()->with('status',"Medicines information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }

}
