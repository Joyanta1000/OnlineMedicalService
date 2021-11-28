<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\doctor;
use App\Models\Duration;
use App\Models\FoodTime;
use App\Models\Frequency;
use App\Models\medicines;
use App\Models\medicines_for_patients;
use App\Models\prescriptions;
use App\Models\problems;
use App\Models\Quantity;
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

        $doctors = doctor::all();
        // dd($doctors);
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

        $id = IdGenerator::generate(['table' => 'prescriptions', 'length' => 10, 'prefix' => date('ym')]);

        $createPrescription = prescriptions::create([
            'id' => $id,
            'doctors_id' => 2111000001,
            'patients_id' => 2111000002,
        ]);

        foreach ($request->medicines_id as $key => $value) {

            $medicines_for_patients = medicines_for_patients::create([
                'prescriptions_id' => $createPrescription->id,
                'medicines_id' => $value,
            ]);
        }

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
