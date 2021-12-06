<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
// use Session;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\User;
use App\Models\city;
use App\Models\country;
use App\Models\thana;
use App\Models\area;
use App\Models\gender;
use App\Models\marital_status;
use App\Models\specialities_of_doctor;
use App\Models\doctors_profile_pictures;
use App\Models\doctors_specialities;
use App\Models\doctor;
use App\Models\doctors_files;
use App\Models\contact_information;
use App\Models\social_networks;
use App\Models\address;
use App\Models\permanent_address;
use App\Models\doctors_other_information;
use App\Models\important_information;
use App\Models\patient;
use App\Models\patients_files;
use App\Models\patients_profile_picture;
use App\Models\pharmacies;
use App\Models\pharmacies_files;
use App\Models\pharmacies_profile_pictures;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

// return redirect()->back()->withErrors($validator)->withInput();

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $failed = "Invalid Email or Password";

        return view('authentication.User_Login');
        // $areas = DB::table('areas')
        //     ->join('countries', 'areas.countries_id', '=', 'countries.id')
        //     ->join('cities', 'areas.cities_id', '=', 'cities.id')
        //     ->join('thanas', 'areas.thanas_id', '=', 'thanas.id')
        //     ->select('areas.*', 'countries.country', 'cities.city', 'thanas.thana')
        //     ->get();

        // return view('authentication.doctors_registration',compact('areas'));
    }

    public function loginVerification(Request $request)
    {
        $email = $request->email;

        $user = User::where(['email' => $email, 'is_active' => 1])->first();
        if ($user) {
            return json_encode(array('dataSuccess' => '<b style="color:green;">Email Verified</b>'));
        } else {
            return json_encode(array('dataFailure' => '<b style="color:red;">Email Not Verified or Email Not Exists</b>'));
        }
    }

    public function countries_for_area()
    {
        $countries = country::all();
        $genders = gender::all();

        return view('authentication.doctors_registration', compact('countries', 'genders'));
    }

    public function countries_for_area_for_patients_registration()
    {
        $countries = country::all();
        $genders = gender::all();
        $marital_statuses = marital_status::all();

        return view('authentication.patients_registration', compact('countries', 'genders', 'marital_statuses'));
    }

    public function countries_for_area_for_pharmacists_registration()
    {
        $countries = country::all();

        return view('authentication.pharmacists_registration', compact('countries'));
    }

    public function thanas_for_area($id)
    {

        $thanas_info = DB::table('thanas')
            //->join('countries', 'cities.countries_id', '=', 'countries.id')
            ->select('thanas.*')
            ->where('thanas.cities_id', '=', $id)
            ->get();
        //dd($cities_info);
        //$countries_info = country::all();

        //dd($countries_info);

        //dd($cities_info);
        $response = array(
            'data' => $thanas_info,
        );
        echo json_encode($response);
        //dd($c);

        //return view('admin.add_state_or_district',compact('response'));
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
    public function register_doctor(Request $request)
    {
        $rules = [
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'fathers_name' => 'required',
            // 'mothers_name' => 'required',
            // 'gender_id' => 'required',
            // 'date_of_birth' => 'required',
            // 'country_id' => 'required',
            // 'city_id' => 'required',
            // 'thana_id' => 'required',
            // 'area_id' => 'required',
            // 'address' => 'required',
            // 'zip_code' => 'required',
            // 'permanent_country_id' => 'required',
            // 'permanent_city_id' => 'required',
            // 'permanent_thana_id' => 'required',
            // 'permanent_area_id' => 'required',
            // 'permanent_address' => 'required',
            // 'permanent_address_zip_code' => 'required',
            // 'email' => 'required|unique:users,email',
            // 'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
            // 'confirm_password' => 'min:6',
            // 'profile_picture' => 'required',
            // 'pdf_file_of_certificate' => 'required',
            // 'work_place' => 'required',
            // 'works_mobile_phone' => 'required',
            // 'phonenumber' => 'required',
            // 'fax' => 'required',
            // 'social_network_link' => 'required',
            // 'nid_card_number' => 'required',
            // 'birth_certificate_number' => 'required',
            // 'specialist_of' => 'required',
            // 'photo_of_signature' => 'required',
            // 'phonenumber' => 'required',
            // 'phonenumber' => 'required',
            // 'phonenumber' => 'required',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {

                set_time_limit(1000);

                $id = IdGenerator::generate(['table' => 'users', 'length' => 10, 'prefix' => date('ym')]);
                $code = Str::random(30);
                $to_email = $data['email'];
                $to_name = $data['first_name'];

                $user = new User;
                $user->id = $id;
                $user->email = $to_email;
                $user->password = md5($data['password']);
                $user->role = 2;
                $user->is_active = 0;
                $user->token = $code;
                $user->save();

                $doctor = new doctor;
                $doctor->doctors_id = $id;
                $doctor->first_name = $to_name;
                $doctor->last_name = $data['last_name'];
                $doctor->fathers_name = $data['fathers_name'];
                $doctor->mothers_name = $data['mothers_name'];
                $doctor->gender_id = $data['gender_id'];
                $doctor->date_of_birth = $data['date_of_birth'];
                $doctor->save();

                $extra_1 = Str::random(32);

                $doctors_profile_picture = new doctors_profile_pictures;
                $doctors_profile_picture->doctors_id = $id;
                $profile_picture = $request->file('profile_picture');
                $profile_pictures_name = time() . '.' . $code . '.' . $extra_1 . '.' . $profile_picture->getClientOriginalExtension();
                $profile_pictures_path = public_path('/Doctors_Files/Doctors_Profile_Pictures/');
                $profile_picture->move($profile_pictures_path, $profile_pictures_name);
                $doctors_profile_picture->profile_picture = '/Doctors_Files/Doctors_Profile_Pictures/' . $profile_pictures_name;
                $doctors_profile_picture->save();

                $extra_2 = Str::random(32);

                $doctors_file = new doctors_files;
                $doctors_file->doctors_id = $id;
                $pdf_file_of_certificate = $request->file('pdf_file_of_certificate');
                $name_of_pdf_file_of_certificate = time() . '.' . $code . '.' . $extra_2 . '.' . $pdf_file_of_certificate->getClientOriginalExtension();
                $path_of_pdf_file_of_certificate = public_path('/Doctors_Files/Doctors_Certificates_Pdf_Files/');
                $pdf_file_of_certificate->move($path_of_pdf_file_of_certificate, $name_of_pdf_file_of_certificate);
                $doctors_file->pdf_file_of_certificate = '/Doctors_Files/Doctors_Certificates_Pdf_Files/' . $name_of_pdf_file_of_certificate;
                $doctors_file->save();

                $contact_information = new contact_information;
                $contact_information->doctors_id = $id;
                $contact_information->work_place = $data['work_place'];
                $contact_information->works_mobile_phone = $data['works_mobile_phone'];
                $contact_information->phonenumber = $data['phonenumber'];
                $contact_information->fax = $data['fax'];
                $contact_information->save();

                $amount_of_social_network_link = count($data['social_network_link']);
                for ($i = 0; $i < $amount_of_social_network_link; $i++) {

                    $social_network = new social_networks;
                    $social_network->doctors_id = $id;
                    $social_network->social_network_link = $data['social_network_link'][$i];
                    $social_network->save();
                }

                $address = new address;
                $address->doctors_id = $id;
                $address->country_id = $data['country_id'];
                $address->city_id = $data['city_id'];
                $address->thana_id = $data['thana_id'];
                $address->area_id = $data['area_id'];
                $address->address = $data['address'];
                $address->zip_code = $data['zip_code'];
                $address->save();

                $permanent_address = new permanent_address;
                $permanent_address->doctors_id = $id;
                $permanent_address->permanent_country_id = $data['permanent_country_id'];
                $permanent_address->permanent_city_id = $data['permanent_city_id'];
                $permanent_address->permanent_thana_id = $data['permanent_thana_id'];
                $permanent_address->permanent_area_id = $data['permanent_area_id'];
                $permanent_address->permanent_address = $data['permanent_address'];
                $permanent_address->permanent_address_zip_code = $data['permanent_address_zip_code'];
                $permanent_address->save();

                $important_information = new important_information;
                $important_information->doctors_id = $id;
                $important_information->nid_card_number = $data['nid_card_number'];
                $important_information->birth_certificate_number = $data['birth_certificate_number'];
                $important_information->save();

                $amount_of_specialization_of_doctor = count($data['specialist_of']);
                for ($i = 0; $i < $amount_of_specialization_of_doctor; $i++) {

                    $doctors_speciality = new doctors_specialities;
                    $doctors_speciality->doctors_id = $id;
                    $doctors_speciality->specialist_of = $data['specialist_of'][$i];
                    $doctors_speciality->save();
                }

                $extra_3 = Str::random(32);

                $doctors_other_information = new doctors_other_information;
                $doctors_other_information->doctors_id = $id;
                $photo_of_signature = $request->file('photo_of_signature');
                $name_of_the_photo_of_signature = time() . '.' . $code . '.' . $extra_3 . '.' . $photo_of_signature->getClientOriginalExtension();
                $path_of_the_photo_of_signature = public_path('/Doctors_Files/Doctors_Photo_of_Signature/');
                $photo_of_signature->move($path_of_the_photo_of_signature, $name_of_the_photo_of_signature);
                $doctors_other_information->photo_of_signature = '/Doctors_Files/Doctors_Photo_of_Signature/' . $name_of_pdf_file_of_certificate;
                $doctors_other_information->save();

                $confirmation_code = array('confirmation_code' => $code);

                Mail::send('authentication/emailverify', $confirmation_code, function ($message) use ($to_email, $to_name) {
                    $message->to($to_email, $to_name)->subject('Email verification mail');
                    $message->from('example@gmail.com', 'Example');
                });

                return redirect()->back()->with('status', "You Registered Successfully, Please Verify Your Email ID");
            } catch (Exception $e) {
                return redirect()->back()->with('failed', "operation failed");
            }
        }
    }

    public function register_patient(Request $request)
    {
        //dd($request);
        $rules = [
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'fathers_name' => 'required',
            // 'mothers_name' => 'required',
            // 'gender_id' => 'required',
            // 'marital_status_id' => 'required',
            // 'date_of_birth' => 'required',
            // 'country_id' => 'required',
            // 'city_id' => 'required',
            // 'thana_id' => 'required',
            // 'area_id' => 'required',
            // 'address' => 'required',
            // 'zip_code' => 'required',
            // 'permanent_country_id' => 'required',
            // 'permanent_city_id' => 'required',
            // 'permanent_thana_id' => 'required',
            // 'permanent_area_id' => 'required',
            // 'permanent_address' => 'required',
            // 'permanent_address_zip_code' => 'required',
            // 'email' => 'required|unique:users,email',
            // 'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
            // 'confirm_password' => 'min:6',
            // 'patients_profile_picture' => 'required',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {


                set_time_limit(1000);

                $id = IdGenerator::generate(['table' => 'users', 'length' => 10, 'prefix' => date('ym')]);
                $code = Str::random(30);
                $to_email = $data['email'];
                $to_name = $data['first_name'];

                $user = new User;
                $user->id = $id;
                $user->email = $to_email;
                $user->password = md5($data['password']);
                $user->role = 3;
                $user->is_active = 0;
                $user->token = $code;
                $user->save();

                $patient = new patient;
                $patient->patients_id = $id;
                $patient->first_name = $to_name;
                $patient->last_name = $data['last_name'];
                $patient->fathers_name = $data['fathers_name'];
                $patient->mothers_name = $data['mothers_name'];
                $patient->gender_id = $data['gender_id'];
                $patient->marital_status_id = $data['marital_status_id'];
                $patient->date_of_birth = $data['date_of_birth'];
                $patient->save();

                $extra_1 = Str::random(32);

                $patients_profile_picture = new patients_profile_picture;
                $patients_profile_picture->patients_id = $id;
                $profile_picture = $request->file('patients_profile_picture');
                $profile_pictures_name = time() . '.' . $code . '.' . $extra_1 . '.' . $profile_picture->getClientOriginalExtension();
                $profile_pictures_path = public_path('/Patients_Files/Patients_Profile_Pictures/');
                $profile_picture->move($profile_pictures_path, $profile_pictures_name);
                $patients_profile_picture->patients_profile_picture = '/Patients_Files/Patients_Profile_Pictures/' . $profile_pictures_name;
                $patients_profile_picture->save();

                $extra_2 = Str::random(32);

                $patients_files = new patients_files;
                $patients_files->patients_id = $id;
                $pdf_file_of_report = $request->file('patients_report');
                $name_of_pdf_file_of_report = time() . '.' . $code . '.' . $extra_2 . '.' . $pdf_file_of_report->getClientOriginalExtension();
                $path_of_pdf_file_of_report = public_path('/Patients_Files/Patients_Reports_Pdf_Files/');
                $pdf_file_of_report->move($path_of_pdf_file_of_report, $name_of_pdf_file_of_report);
                $patients_files->patients_report = '/Patients_Files/Patients_Reports_Pdf_Files/' . $name_of_pdf_file_of_report;
                $patients_files->save();



                $address = new address;
                $address->patients_id = $id;
                $address->country_id = $data['country_id'];
                $address->city_id = $data['city_id'];
                $address->thana_id = $data['thana_id'];
                $address->area_id = $data['area_id'];
                $address->address = $data['address'];
                $address->zip_code = $data['zip_code'];
                $address->save();

                $permanent_address = new permanent_address;
                $permanent_address->patients_id = $id;
                $permanent_address->permanent_country_id = $data['permanent_country_id'];
                $permanent_address->permanent_city_id = $data['permanent_city_id'];
                $permanent_address->permanent_thana_id = $data['permanent_thana_id'];
                $permanent_address->permanent_area_id = $data['permanent_area_id'];
                $permanent_address->permanent_address = $data['permanent_address'];
                $permanent_address->permanent_address_zip_code = $data['permanent_address_zip_code'];
                $permanent_address->save();


                $confirmation_code = array('confirmation_code' => $code);

                Mail::send('authentication/emailverify', $confirmation_code, function ($message) use ($to_email, $to_name) {
                    $message->to($to_email, $to_name)->subject('Email verification mail');
                    $message->from('example@gmail.com', 'Example');
                });

                return redirect()->back()->with('status', "You Registered Successfully, Please Verify Your Email ID");
            } catch (Exception $e) {
                return redirect()->back()->with('failed', "operation failed");
            }
        }
    }

    public function register_pharmacy(Request $request)
    {
        $rules = [
            'phermacies_name' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'thana_id' => 'required',
            'area_id' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'permanent_country_id' => 'required',
            'permanent_city_id' => 'required',
            'permanent_thana_id' => 'required',
            'permanent_area_id' => 'required',
            'permanent_address' => 'required',
            'permanent_address_zip_code' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
            'confirm_password' => 'min:6',
            'pharmacies_profile_picture' => 'required',
            'evidence' => 'required',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {


                set_time_limit(1000);

                $id = IdGenerator::generate(['table' => 'users', 'length' => 10, 'prefix' => date('ym')]);
                $code = Str::random(30);
                $to_email = $data['email'];
                $to_name = $data['phermacies_name'];

                $user = new User;
                $user->id = $id;
                $user->email = $to_email;
                $user->password = md5($data['password']);
                $user->role = 4;
                $user->is_active = 0;
                $user->token = $code;
                $user->save();

                $patient = new pharmacies;
                $patient->phermacies_id = $id;
                $patient->phermacies_name = $to_name;
                $patient->save();

                $extra_1 = Str::random(32);

                $pharmacies_profile_picture = new pharmacies_profile_pictures;
                $pharmacies_profile_picture->phermacies_id = $id;
                $profile_picture = $request->file('pharmacies_profile_picture');
                $profile_pictures_name = time() . '.' . $code . '.' . $extra_1 . '.' . $profile_picture->getClientOriginalExtension();
                $profile_pictures_path = public_path('/Pharmacies_Files/Pharmacies_Profile_Pictures/');
                $profile_picture->move($profile_pictures_path, $profile_pictures_name);
                $pharmacies_profile_picture->pharmacies_profile_picture = '/Pharmacies_Files/Pharmacies_Profile_Pictures/' . $profile_pictures_name;
                $pharmacies_profile_picture->save();

                $extra_2 = Str::random(32);

                $pharmacies_files = new pharmacies_files;
                $pharmacies_files->phermacies_id = $id;
                $pdf_file_of_evidence = $request->file('evidence');
                $name_of_pdf_file_of_evidence = time() . '.' . $code . '.' . $extra_2 . '.' . $pdf_file_of_evidence->getClientOriginalExtension();
                $path_of_pdf_file_of_evidence = public_path('/Pharmacies_Files/Pharmacies_Evidences/');
                $pdf_file_of_evidence->move($path_of_pdf_file_of_evidence, $name_of_pdf_file_of_evidence);
                $pharmacies_files->evidence = '/Pharmacies_Files/Pharmacies_Evidences/' . $name_of_pdf_file_of_evidence;
                $pharmacies_files->save();



                $address = new address;
                $address->patients_id = $id;
                $address->country_id = $data['country_id'];
                $address->city_id = $data['city_id'];
                $address->thana_id = $data['thana_id'];
                $address->area_id = $data['area_id'];
                $address->address = $data['address'];
                $address->zip_code = $data['zip_code'];
                $address->save();

                $permanent_address = new permanent_address;
                $permanent_address->patients_id = $id;
                $permanent_address->permanent_country_id = $data['permanent_country_id'];
                $permanent_address->permanent_city_id = $data['permanent_city_id'];
                $permanent_address->permanent_thana_id = $data['permanent_thana_id'];
                $permanent_address->permanent_area_id = $data['permanent_area_id'];
                $permanent_address->permanent_address = $data['permanent_address'];
                $permanent_address->permanent_address_zip_code = $data['permanent_address_zip_code'];
                $permanent_address->save();


                $confirmation_code = array('confirmation_code' => $code);

                Mail::send('authentication/emailverify', $confirmation_code, function ($message) use ($to_email, $to_name) {
                    $message->to($to_email, $to_name)->subject('Email verification mail');
                    $message->from('example@gmail.com', 'Example');
                });

                return redirect()->back()->with('status', "You Registered Successfully, Please Verify Your Email ID");
            } catch (Exception $e) {
                return redirect()->back()->with('failed', "operation failed");
            }
        }
    }


    public function verify()
    {
        return view('authentication.emailverify');
    }

    public function verified($token)
    {
        $verified = DB::table('users')->where('token', $token)->update(['is_active' => 1]);
        if ($verified) {
        }
        return view('authentication.verification_message')->with('status', 'Your email id verified successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function redirectTo(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);
        $data = $request->input();
        try {

            $email = $request->email;
            $password = md5($request->password);

            $obj = User::where('email', '=', $email)
                ->where('password', '=', $password)
                ->first();

            if ($obj) {

                // $response = array(
                //     'data' => $obj,
                // );
                // return json_encode($response);

                $request->session()->put('id', $obj->id);
                $request->session()->put('email', $obj->email);
                $request->session()->put('password', $obj->password);
                $request->session()->put('role', $obj->role);
                $request->session()->put('is_active', $obj->is_active);

                //Session::put('email', $value);
                //dd($obj->role);
                switch ($obj->role) {
                    case 1:
                        return $this->IndexForAdmin();
                        break;
                    case 2:
                        return $this->IndexForDoctor();
                        break;
                    case 3:
                        return $this->IndexForPatient();
                        break;
                    case 4:
                        return $this->IndexForPharmacist();
                        break;
                    default:
                        $this->redirectTo = '/login/User_Login';

                        $failed = "Invalid Email or Password";

                        return $this->redirectTo->with(['failed' => $failed]);
                        break;
                }
            } else {

                //  $request->session()->flush();
                // dd('error');
                $failed = "Invalid Email or Password ";
                //Session::flash('failed', 'Invalid Email or Password !');
                // Session::save();
                // Session::flash('alert-class', 'alert-danger');
                $request->session()->flash('failed', $failed);
                return redirect()->route('login.User_Login');
            }
        } catch (Exception $e) {

            return back()->with(['failed' => "operation failed"]);
        }
    }

    public function IndexForAdmin()
    {
        return redirect('admin');
    }

    public function loggedinSession()
    {
        $SessionId = Session::get('id');
        return response()->json([
            'data' => $SessionId ?  $SessionId : null,
            'message' => $SessionId ? 'Successfully Retrieved' : 'Error',
        ], 200);
    }

    public function IndexForDoctor()
    {
        $doctorInfo = doctor::where('doctors_id', session()->get('id'))
            ->first();
        $doctorProPic = doctors_profile_pictures::where('doctors_id', session()->get('id'))
            ->first();
        session()->put('first_name', $doctorInfo->first_name);
        session()->put('last_name', $doctorInfo->last_name);
        session()->put('profile_picture', $doctorProPic->profile_picture);
        return redirect('doctor_dashboard');
    }

    public function IndexForPatient()
    {
        $patientInfo = patient::where('patients_id', session()->get('id'))
            ->first();
        $patientProPic = patients_profile_picture::where('patients_id', session()->get('id'))
            ->first();
        session()->put('first_name', $patientInfo->first_name);
        session()->put('last_name', $patientInfo->last_name);
        session()->put('profile_picture', $patientProPic->patients_profile_picture);
        return redirect('patient_dashboard');
    }

    public function IndexForPharmacist()
    {
        return redirect('pharmacist_dashboard');
    }

    public function send_mail_to_reset_password(Request $request)
    {
        $rules = [
            'email' => 'required|string|min:1|max:255|exists:users,email',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {

                set_time_limit(1000);



                $to_email = $data['email'];


                $user = User::where('email', '=', $to_email)
                    ->first();

                $token = $user->token;




                $token = array('token' => $token);

                Mail::send('authentication/reset_password_mail', $token, function ($message) use ($to_email) {
                    $message->to($to_email)->subject('Reset Your Password');
                    $message->from('example@gmail.com', 'Example');
                });

                return redirect()->back()->with('status', "Your mail send successfully");
            } catch (Exception $e) {
                return redirect()->back()->with('failed', "operation failed");
            }
        }
    }

    public function reset_password_mail()
    {
        return view('reset_password_mail');
    }

    public function reset_password($token)
    {

        $user = User::where('token', '=', $token)->first();

        return view('authentication.reset_password', compact('user'));
    }

    public function reset_user_password(Request $request, $email)
    {
        $rules = [
            'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
            'confirm_password' => 'min:6'
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {

                set_time_limit(1000);

                $code = Str::random(30);

                $user = DB::table('users')->where('email', $email)->update(['password' => md5($data['password']), 'token' =>  $code]);

                return redirect('login.User_Login')->with('status', "Your password updated successfully");
            } catch (Exception $e) {
                return redirect()->back()->with('failed', "operation failed");
            }
        }
    }

    public function doctors()
    {

        $doctors = DB::table('users')
            ->join('doctors', 'users.id', '=', 'doctors.doctors_id')
            ->join('doctors_profile_pictures', 'users.id', '=', 'doctors_profile_pictures.doctors_id')
            ->join('doctors_files', 'users.id', '=', 'doctors_files.doctors_id')
            ->join('contact_informations', 'users.id', '=', 'contact_informations.doctors_id')
            ->join('addresses', 'users.id', '=', 'addresses.doctors_id')
            ->join('permanent_addresses', 'users.id', '=', 'permanent_addresses.doctors_id')
            ->join('important_informations', 'users.id', '=', 'important_informations.doctors_id')
            ->join('doctors_other_informations', 'users.id', '=', 'doctors_other_informations.doctors_id')
            ->join('doctors_schedules', 'users.id', '=', 'doctors_schedules.doctors_id')
            ->select('users.id as user_id', 'doctors.*', 'doctors_profile_pictures.*', 'doctors_files.*', 'contact_informations.*', 'addresses.*', 'permanent_addresses.*', 'important_informations.*', 'doctors_other_informations.*', 'doctors_schedules.schedule')
            ->paginate(4);

        $doctors_social_networks = DB::table('users')
            ->join('social_networks', 'users.id', '=', 'social_networks.doctors_id')
            ->select('social_networks.*')
            ->get();

        $doctors_specialities = DB::table('users')
            ->join('doctors_specialities', 'users.id', '=', 'doctors_specialities.doctors_id')
            ->select('doctors_specialities.*')
            ->get();

        $doctors_addresses = DB::table('addresses')
            ->join('countries', 'addresses.country_id', '=', 'countries.id')
            ->join('cities', 'addresses.city_id', '=', 'cities.id')
            ->join('thanas', 'addresses.thana_id', '=', 'thanas.id')
            ->join('areas', 'addresses.area_id', '=', 'areas.id')
            ->select('addresses.*', 'countries.*', 'cities.*', 'thanas.*', 'areas.*')
            ->get();
        //dd($doctors);
        return view('patient.pages.doctors', compact('doctors', 'doctors_social_networks', 'doctors_specialities', 'doctors_addresses'));
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
}
