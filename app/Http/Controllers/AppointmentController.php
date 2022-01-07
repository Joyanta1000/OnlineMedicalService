<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\patient;
use App\Models\doctor;
use App\Models\chats;
use App\Models\contact_information;
use App\Models\important_information;
use App\Models\PatientsContactInfo;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Exception;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use Vonage\Message\Client as MessageClient;
use Vonage\SMS\Client as SMSClient;
use Illuminate\Support\Str;

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

        return view('patient.pages.pay', compact('intent', 'id'));
    }

    public function create()
    {
    }

    public function store(Request $request, $id)
    {

        $obj = patient::where('patients_id', session()->get('id'))->first();

        $appointed = Appointment::create([
            'doctor_id' => $id,
            'patient_id' => session()->get('id'),
            'description' => 'Patients Payment to the Doctor',
            'amount' => 100,
            'payment_from' => $obj->first_name,
            'payment_method_types' => 'card',
        ]);

        $message_id = IdGenerator::generate(['table' => 'chats', 'field' => 'message_id', 'length' => 10, 'prefix' => date('ym')]);

        $addedToChat = chats::create([
            'recievers_id' => $id,
            'senders_id' => session()->get('id'),
            'message_id' => $message_id ? $message_id : 00001,
            'message' => 'Patient wanted to consult',
        ]);

        if ($appointed && $addedToChat) {
            //            return back()->with('status', "Payment received successfully and you appointed, wait for doctors message");
            return redirect()->route('doctors')->with(
                'success', 'You requested for consultation, wait for doctors response');
        } else {
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
            ->where('doctor_id', session()->get('id'))
            ->orWhere('patient_id', session()->get('id'))
            ->get();
        //dd($appointed);
        return view('doctor.pages.appointments', compact('appointed'));
    }

    public function edit(Appointment $appointment)
    {
        //
    }

    public function changeStatus($id, Appointment $appointment)
    {
        if ($appointment->where('id', $id)->first()->is_active == 0 && empty(request()->get('requestFor')) || $appointment->where('id', $id)->first()->is_active == 2 && empty(request()->get('requestFor'))) {

            $ticket = Str::random(10);
            
            if ($appointment->where('id', $id)->update(['is_active' => 1, 'ticket' => $ticket])) {

                $receiverEmail = User::find($appointment->where('id', $id)->first()->patient_id)->email;

                $doctorName = doctor::where('doctors_id', $appointment->where('id', $id)->first()->doctor_id)->first();
                $receiverNumber = PatientsContactInfo::where('patient_id', $appointment->where('id', $id)->first()->patient_id)->first()->phonenumber;
                $doctorEmail = User::find($appointment->where('id', $id)->first()->doctor_id)->email;
                $workplace = contact_information::where('doctors_id', $appointment->where('id', $id)->first()->doctor_id)->first()->work_place;
                $message = "Appointment Scheduled." . "\n" . " Doctor: " . $doctorName->first_name . " " . $doctorName->last_name . ".\n" . " His/Her Email: " . $doctorEmail . ".\n" . " Your Ticket: " . $ticket . ".\n" . " Place: " . $workplace . ".\n" . " Time or anything will be informed by chat, you can consult with him/her by chatting also.";

                $details = [
                    'title' => 'Mail from MEDI H+',
                    'body' => $message
                ];

                Mail::to($receiverEmail)->send(new \App\Mail\MyMail($details));

                try {

                    $account_sid = getenv('TWILIO_SID');
                    $auth_token = getenv('TWILIO_TOKEN');
                    $twilio_number = getenv('TWILIO_FROM');

                    $client = new Client($account_sid, $auth_token);
                    $sent = $client->messages->create($receiverNumber, [
                        'from' => $twilio_number,
                        'body' => $message
                    ]);

                    return back()->with('status', 'Appointed');
                } catch (Exception $e) {
                    dd("Error: " . $e->getMessage());
                }

                return back()->with('status', 'Appointed');
            }
        } else if (request()->get('requestFor') == 'cancelation') {
            if ($appointment->where('id', $id)->update(['is_active' => 2])) {

                $receiverEmail = User::find($appointment->where('id', $id)->first()->patient_id)->email;
                $doctorName = doctor::where('doctors_id', $appointment->where('id', $id)->first()->doctor_id)->first();
                $receiverNumber = PatientsContactInfo::where('patient_id', $appointment->where('id', $id)->first()->patient_id)->first()->phonenumber;
                // dd($receiverNumber);
                $doctorEmail = User::find($appointment->where('id', $id)->first()->doctor_id)->email;
                $message = "Appointment Canceled. " . "\n" . "Doctor: " . $doctorName->first_name . " " . $doctorName->last_name . ".\n" . " His/Her Email: " . $doctorEmail . ".\n" . " Your Ticket: " . $appointment->find($id)->ticket . ".";
                $details = [
                    'title' => 'Mail from MEDI H+',
                    'body' => $message
                ];

                Mail::to($receiverEmail)->send(new \App\Mail\MyMail($details));

                try {

                    $account_sid = getenv('TWILIO_SID');
                    $auth_token = getenv('TWILIO_TOKEN');
                    $twilio_number = getenv('TWILIO_FROM');

                    $client = new Client($account_sid, $auth_token);
                    $sent = $client->messages->create($receiverNumber, [
                        'from' => $twilio_number,
                        'body' => $message
                    ]);

                    return back()->with('failed', "Canceled Appointment");
                } catch (Exception $e) {
                    dd("Error: " . $e->getMessage());
                }

                return back()->with('failed', "Canceled Appointment");
            }
        }
    }

    public function destroy(Appointment $appointment)
    {
        //
    }
}
