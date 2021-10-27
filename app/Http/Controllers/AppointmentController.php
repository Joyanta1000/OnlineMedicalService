<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\patient;
use App\Models\doctor;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        //dd($id);
        \Stripe\Stripe::setApiKey('sk_test_51HVVyCD7a6E2ghuvtdNHKssMRVQirLSyiOZ25XcDJ8f0p3lYFgDxNXu5sUNWHuTH0civfKUyJcRoLdf6g0BdMgjf00qxvka1GU');

        $amount = 100;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'INR',
            'description' => 'Payment From Codehunger',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        //dd($intent);

        return view('patient.pages.pay',compact('intent', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $obj = patient::where('patients_id',session()->get('id'))->first();

        $appointed = Appointment::create([
            'doctor_id' => $id,
            'patient_id' => session()->get('id'),
            'description' => 'Patients Payment to the Doctor',
            'amount' => 100,
            'payment_from' => $obj->first_name,
            'payment_method_types' => 'card',
        ]);

        if($appointed) {
//            return back()->with('status', "Payment received successfully and you appointed, wait for doctors message");
            return redirect()->route('doctors')->withSuccess('Payment received successfully and you appointed, wait for doctors message');
        }
        else{
            return back()->with('failed', "Payment Not Received successfully");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function list(Appointment $appointments)
    {
        // $doctor = $users->with('patient','appointment')->where('id', session()->get('id'))->get();
        $appointed = $appointments
        ->join('doctors', 'appointments.doctor_id', '=', 'doctors.doctors_id')
        ->join('patients', 'appointments.patient_id', '=', 'patients.patients_id')
        ->select('appointments.*', 'doctors.first_name as doctorsFirstName', 'doctors.last_name as doctorsLastName', 'patients.first_name as patientsFirstName', 'patients.last_name as patientsLastName')
        ->where('doctor_id', session()->get('id'))->get();
        //dd($appointed);
        return view('doctor.pages.appointments', compact('appointed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
