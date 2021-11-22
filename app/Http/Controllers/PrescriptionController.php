<?php

namespace App\Http\Controllers;

use App\Models\Duration;
use App\Models\FoodTime;
use App\Models\Frequency;
use App\Models\medicines;
use App\Models\medicines_for_patients;
use App\Models\prescriptions;
use App\Models\Quantity;
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
        $medicines = medicines::all();
        // dd($medicines);
        return view('prescription.index', compact('medicines'));
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


        $createPrescription = prescriptions::create([
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
    public function show(prescriptions $prescriptions)
    {
        //
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
