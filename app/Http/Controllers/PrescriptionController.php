<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\doctor;
use App\Models\Duration;
use App\Models\FoodTime;
use App\Models\Frequency;
use App\Models\medicines;
use App\Models\medicines_for_patients;
use App\Models\patients_having_problems;
use App\Models\patients_problems;
use App\Models\prescriptions;
use App\Models\problems;
use App\Models\Quantity;
use App\Models\referred_to;
use App\Models\Test;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = medicines::where('is_active', 1)->get();

        $problems = problems::where('is_active', 1)->get();

        $doctors = doctor::whereNotIn('doctors_id', [session()->get('id')])->get();
        
        $doctorsInfo = User::with('doctor', 'doctors_specialities')->when(session()->get('id'), function ($q) {
            return $q->where('id', session()->get('id'))->orderBy('created_at', 'DESC');
        })->first();
        // dd($doctorsInfo);
        $doctorsAddresses = address::with('city', 'country', 'thana', 'area')->when(session()->get('id'), function ($q) {
            return $q->where('doctors_id', session()->get('id'))->orderBy('created_at', 'DESC')->latest();
        })->first();

        $patientsInfo = User::with('patient')->when(request()->id, function ($q) {
            return $q->where('id', request()->id)->orderBy('created_at', 'DESC');
        })->first();

        $prescription = prescriptions::orderBy('created_at', 'DESC')->first();
        //dd($prescription);
        return view('prescription.index', compact('medicines', 'doctorsInfo', 'doctors', 'doctorsAddresses', 'patientsInfo', 'prescription', 'problems'));
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

        // dd($request->all());
        $id = IdGenerator::generate(['table' => 'prescriptions', 'length' => 10, 'prefix' => date('ym')]);

        $createPrescription = prescriptions::create([
            'id' => $id,
            'doctors_id' => session()->get('id'),
            'patients_id' => $request->patients_id,
        ]);

        foreach ($request->medicines_id as $key => $value) {

            $medicines_for_patients = medicines_for_patients::create([
                'prescriptions_id' => $createPrescription->id,
                'medicines_id' => $value,
            ]);
        }

        $test = Test::create([
            'prescriptions_id' => $createPrescription->id,
            'test' => $request->test,
        ]);

        $having_problems = patients_problems::create([
            'prescriptions_id' => $createPrescription->id,
            'problem' => json_encode($request->problem),
        ]);

        $refer = referred_to::create([
            'prescriptions_id' => $createPrescription->id,
            'referred_to' => $request->refer,
        ]);

        $frequency = Frequency::create([
            'prescriptions_id' => $createPrescription->id,
            'mn' => json_encode($request->mn),
            'af' => json_encode($request->af),
            'en' => json_encode($request->en),
            'nt' => json_encode($request->nt),
        ]);

        $foodTime = FoodTime::create([
            'prescriptions_id' => $createPrescription->id,
            'before_food' => json_encode($request->before_food),
            'after_food' => json_encode($request->after_food),
        ]);

        $duration = Duration::create([
            'prescriptions_id' => $createPrescription->id,
            'duration' => json_encode($request->duration),
        ]);

        $duration = Quantity::create([
            'prescriptions_id' => $createPrescription->id,
            'qty' => json_encode($request->qty),
        ]);

        if($createPrescription)
        {
            return redirect()->back()->with('status', "Prescribed successfully");
        }
        else
        {
            return redirect()->back()->with('failed', "Prescription not created");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('prescription.prescriptions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function edit(prescriptions $prescriptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prescriptions $prescriptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function destroy(prescriptions $prescriptions)
    {
        //
    }
}
