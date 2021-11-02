<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\patient;
use App\Models\doctor;
use App\Models\chats;

class AppointmentController extends Controller
{

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

    public function create()
    {

    }

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

        $addedToChat = chats::create([
            'recievers_id' => $id,
            'senders_id' => session()->get('id'),
            'message' => 'Wanted to consult',
        ]);

        if($appointed && $addedToChat) {
//            return back()->with('status', "Payment received successfully and you appointed, wait for doctors message");
            return redirect()->route('doctors')->withSuccess([
                'success' => 'The provided credentials do not match our records.',
            ]);
        }
        else{
            return back()->with('failed', "Payment Not Received successfully");
        }
    }

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

    public function edit(Appointment $appointment)
    {
        //
    }

    public function changeStatus($id, Appointment $appointment)
    {
        if($appointment->where('id', $id)->first()->is_active == 0){
            if($appointment->where('id', $id)->update(['is_active' => 1]))
            {
                return back()->withSuccess('Appointed');
            }
        }
        else if ($appointment->where('id', $id)->first()->is_active == 1) {
            if ($appointment->where('id', $id)->update(['is_active' => 0])) {
                return back()->with('failed', "Not Appointed");
            }
        }
    }

    public function destroy(Appointment $appointment)
    {
        //
    }
}