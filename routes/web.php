<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateOrDistrictController;
use App\Http\Controllers\ThanaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\MedicineTypeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BirthCertificateController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NationalIdCardController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\WebsiteController;
use App\Http\Livewire\History;
use App\Http\Livewire\ShowPrescriptions;
use App\Models\Appointment;
use App\Models\BirthCertificate;
use App\Models\prescriptions;
use App\Models\User;
use App\Models\VisitorsLocation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Stevebauman\Location\Facades\Location;

// Route::group(['middleware' => ['web']], function () {

Route::get('reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    dd('Done');
});

Route::get('storageLink', function () {
    Artisan::call('storage:link');
    dd('Done');
});

Route::get('migrate', function () {
    Artisan::call('migrate');
    dd('Done');
});

Route::get('seed', function () {
    Artisan::call('db:seed');
    dd('Done');
});

Route::get('migrate_fresh_seed', function () {
    Artisan::call('migrate:fresh --seed');
    dd('Done');
});

Route::resource('/', WebsiteController::class);

Route::get('/history', function () {
    return view('doctor/pages/history/history');
})->name('history');

Route::resource('nid', NationalIdCardController::class);

Route::resource('birth_certificate_number', BirthCertificateController::class);

Route::resource('chat', ChatController::class);

Route::get('/message/contactList', [ChatController::class, 'contactList'])->name('message.contactList');

Route::get('/message/chatData', [ChatController::class, 'chatData'])->name('message.chatData');

Route::post('/message/submitMsg', [ChatController::class, 'submitMsg'])->name('message.submitMsg');


Route::prefix('registration')->group(

    function () {
        Route::get('/get_city_for_thana/{id}', [ThanaController::class, 'cities_for_thana'])->name('get_city_for_thana');

        Route::get('/get_thana_for_area/{id}', [AreaController::class, 'thanas_for_area'])->name('get_thana_for_area');

        Route::get('/get_area_for_address/{id}', [AreaController::class, 'areas_for_address'])->name('get_area_for_address');

        Route::get('/doctors_registration', [UserController::class, 'countries_for_area'])->name('registration.doctors_registration');

        Route::post('/register_doctor', [UserController::class, 'register_doctor'])->name('registration.register_doctor');

        Route::get('/patients_registration', [UserController::class, 'countries_for_area_for_patients_registration'])->name('registration.patients_registration');

        Route::post('/register_patient', [UserController::class, 'register_patient'])->name('registration.register_patient');

        Route::get('/pharmacists_registration', [UserController::class, 'countries_for_area_for_pharmacists_registration'])->name('registration.pharmacists_registration');

        Route::post('/register_pharmacy', [UserController::class, 'register_pharmacy'])->name('registration.register_pharmacy');
    }
);

Route::get('/emailverify', [UserController::class, 'verify']);

Route::get('/verification/{token}', [UserController::class, 'verified']);

Route::get('/authentication/verification_message', [UserController::class, 'verified']);

Route::post('/loginVerification', [UserController::class, 'loginVerification'])->name('loginVerification');

Route::get('/loggedinSession', [UserController::class, 'loggedinSession']);

Route::prefix('login')->group(

    function () {
        Route::get('/User_Login', [UserController::class, 'index'])->name('login.User_Login');
        Route::post('/loginUser', [UserController::class, 'redirectTo'])->name('login.loginUser');
    }
);

Route::get('/reset', function () {
    return view('authentication.info_for_reset');
});

Route::post('/send_mail_to_reset_password', [UserController::class, 'send_mail_to_reset_password']);

Route::get('/reset_password/{token}', [UserController::class, 'reset_password']);

Route::post('/reset_user_password/{email}', [UserController::class, 'reset_user_password']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/status', [UserController::class, 'userOnlineStatus']);

Route::middleware(['isAdmin'])->group(function () {

    Route::get('/users/', [UserController::class, 'users'])->name('users');
    Route::get('/user_status/', [UserController::class, 'userStatus'])->name('user_status');
    Route::get('/delete_user/{id}', [UserController::class, 'destroy'])->name('delete_user');
    Route::get('/view_user/{id}', [UserController::class, 'show'])->name('view_user');
    Route::get('/admin', function () {
        $countUser = User::whereNotIn('id', [session()->get('id')])->count();
        $countAppointments = Appointment::count();
        $countPrescriptions = prescriptions::count();
        $location = VisitorsLocation::distinct()->get(['ip_address']);
        $users = User::all();
        $countOnline = 0;
        $countOffline = 0;
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                $countOnline++;
            else
                $countOffline++;
            // echo $user->email . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }

        return view('admin.index', compact('countUser', 'countAppointments', 'countPrescriptions', 'location', 'countOnline', 'countOffline'));
    })->name('admin');

    Route::get('/add_gender', function () {
        return view('admin.add_gender');
    })->name('add_gender');

    Route::post('/insert_gender', [GenderController::class, 'insert_gender'])->name('insert_gender');

    Route::get('/genders', [GenderController::class, 'index'])->name('genders');

    Route::get('/edit_gender/{id}', [GenderController::class, 'get_info_of_gender'])->name('edit_gender');

    Route::post('/update_gender/{id}', [GenderController::class, 'update_genders_info'])->name('update_gender');

    Route::get('/delete_genders_information/{id}', [GenderController::class, 'delete_genders_information'])->name('delete_genders_information');

    Route::get('/add_country', function () {
        return view('admin.add_country');
    })->name('add_country');

    Route::post('/insert_country', [CountryController::class, 'insert_country'])->name('insert_country');

    Route::get('/countries', [CountryController::class, 'index'])->name('countries');

    Route::get('/edit_country/{id}', [CountryController::class, 'get_info_of_country'])->name('edit_country');

    Route::post('/update_country/{id}', [CountryController::class, 'update_countries_info'])->name('update_country');

    Route::get('/delete_countries_information/{id}', [CountryController::class, 'delete_countries_information'])->name('delete_countries_information');

    Route::get('/add_city', [CountryController::class, 'countries_for_cities'])->name('add_city');

    Route::post('/insert_city', [CityController::class, 'insert_city'])->name('insert_city');

    Route::get('/cities', [CityController::class, 'index'])->name('cities');

    Route::get('/edit_city/{id}', [CityController::class, 'get_info_of_city'])->name('edit_city');

    Route::post('/update_city/{id}', [CityController::class, 'update_cities_info'])->name('update_city');

    Route::get('/delete_cities_information/{id}', [CityController::class, 'delete_cities_information'])->name('delete_cities_information');

    Route::get('/add_thana', [ThanaController::class, 'countries_for_thana'])->name('add_thana');

    Route::get('/get_city_for_thana/{id}', [ThanaController::class, 'cities_for_thana'])->name('get_city_for_thana');

    Route::post('/insert_thana', [ThanaController::class, 'insert_thana'])->name('insert_thana');

    Route::get('/thanas', [ThanaController::class, 'index'])->name('thanas');

    Route::get('/edit_thana/{id}', [ThanaController::class, 'get_info_of_thana'])->name('edit_thana');

    Route::post('/update_thana/{id}', [ThanaController::class, 'update_thanas_info'])->name('update_thana');

    Route::get('/delete_thanas_information/{id}', [ThanaController::class, 'delete_thanas_information'])->name('delete_thanas_information');

    Route::get('/add_area', [AreaController::class, 'countries_for_area'])->name('add_area');

    Route::get('/get_thana_for_area/{id}', [AreaController::class, 'thanas_for_area'])->name('get_thana_for_area');

    Route::post('/insert_area', [AreaController::class, 'insert_area'])->name('insert_area');

    Route::get('/areas', [AreaController::class, 'index'])->name('areas');

    Route::get('/edit_area/{id}', [AreaController::class, 'get_info_of_area'])->name('edit_area');

    Route::post('/update_area/{id}', [AreaController::class, 'update_areas_info'])->name('update_area');

    Route::get('/delete_areas_information/{id}', [AreaController::class, 'delete_areas_information'])->name('delete_areas_information');

    Route::get('/get_area_for_address/{id}', [AreaController::class, 'areas_for_address'])->name('get_area_for_address');

    Route::get('/add_specialities_of_doctor', function () {
        return view('admin.add_specialities_of_doctor');
    })->name('add_specialities_of_doctor');

    Route::post('/insert_speciality', [SpecialityController::class, 'insert_speciality'])->name('insert_speciality');

    Route::get('/specialities', [SpecialityController::class, 'index'])->name('specialities');

    Route::get('/edit_speciality/{id}', [SpecialityController::class, 'get_info_of_speciality'])->name('edit_speciality');

    Route::post('/update_speciality/{id}', [SpecialityController::class, 'update_specialities_info'])->name('update_speciality');

    Route::get('/delete_specialities_information/{id}', [SpecialityController::class, 'delete_specialities_information'])->name('delete_specialities_information');

    Route::get('/add_marital_status', function () {
        return view('admin.add_marital_status');
    })->name('add_marital_status');

    Route::post('/insert_marital_status', [MaritalStatusController::class, 'insert_marital_status'])->name('insert_marital_status');

    Route::get('/marital_statuses', [MaritalStatusController::class, 'index'])->name('marital_statuses');

    Route::get('/edit_marital_status/{id}', [MaritalStatusController::class, 'get_info_of_marital_status'])->name('edit_marital_status');

    Route::post('/update_marital_status/{id}', [MaritalStatusController::class, 'update_marital_status'])->name('update_marital_status');

    Route::get('/delete_marital_status/{id}', [MaritalStatusController::class, 'delete_marital_statuses_information'])->name('delete_marital_status');

    Route::get('/add_problem', function () {
        return view('admin.add_problem');
    })->name('add_problem');

    Route::post('/insert_problem', [ProblemController::class, 'insert_problem'])->name('insert_problem');

    Route::get('/problems', [ProblemController::class, 'index'])->name('problems');

    Route::post('/change_status_of_problem', [ProblemController::class, 'change_status_of_problem'])->name('change_status_of_problem');

    Route::get('/edit_problems_info/{id}', [ProblemController::class, 'get_info_of_problem'])->name('edit_problems_info');

    Route::post('/update_problems_info/{id}', [ProblemController::class, 'update_problems_info'])->name('update_problems_info');

    Route::get('/delete_problems_info/{id}', [ProblemController::class, 'delete_problems_info'])->name('delete_problems_info');
});


Route::middleware(['isDoctor'])->group(function () {

    Route::get('/doctor_dashboard', function () {
        return view('doctor.pages.index');
    })->name('doctor_dashboard');

    Route::get('/add_schedule', function () {
        return view('doctor.pages.add_schedule');
    })->name('add_schedule');

    Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules');
    Route::get('schedules/view/{id}', [ScheduleController::class, 'show'])->name('schedules.view');
    Route::get('schedules/edit/{id}', [ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::get('schedules/delete/{id}', [ScheduleController::class, 'destroy'])->name('schedules.delete');
    Route::post('/add_doctors_schedule', [ScheduleController::class, 'add_doctors_schedule'])->name('add_doctors_schedule');

    Route::prefix('appointment')->group(function () {
        Route::get('/list', [AppointmentController::class, 'list'])->name('appointment.list');
        Route::get('/status_change/{id}', [AppointmentController::class, 'changeStatus'])->name('appointment.status_change');
    });

    Route::post('/changeScheduleStatus', [ScheduleController::class, 'changeScheduleStatus'])->name('changeScheduleStatus');

    Route::prefix('prescription')->group(
        function () {
            Route::resource('prescription_for_doctor', PrescriptionController::class);
        }
    );


    Route::get('prescription_pdf/{id}', [PrescriptionController::class, 'pdf'])->name('prescription_pdf');

    // Route::get('/historyCheck', History::class);
});

//Route::get('/add_doctors_schedule',[ScheduleController::class, 'add_doctors_schedules']);


Route::middleware(['isPatient'])->group(function () {

    Route::get('/patient_dashboard', function () {
        return view('patient.pages.index');
    })->name('patient_dashboard');
    Route::prefix('appointment')->group(function () {
        // Route::resource('checkout', AppointmentController::class);
        Route::get('/checkout/index/{id}', [AppointmentController::class, 'index'])->name('appointment.checkout.index');
        Route::post('/checkout/store/{id}', [AppointmentController::class, 'store'])->name('appointment.checkout.store');
    });
    Route::get('/doctors', [UserController::class, 'doctors'])->name('doctors');

    Route::get('/view_doctor_for_patient/{id}', [UserController::class, 'view_doctor_for_patient'])->name('view_doctor_for_patient');

    Route::prefix('prescription')->group(
        function () {
            Route::resource('prescriptions', PrescriptionController::class);
        }
    );

    Route::get('prescription/view/{id}', [PrescriptionController::class, 'view'])->name('prescription.view');
    Route::get('report/delete/{id}', [PrescriptionController::class, 'report_delete'])->name('report.delete');
    // Route::post('/store', [ShowPrescriptions::class, 'store']);
    Route::get('prescription_pdf_download_by_patient/{id}', [
        PrescriptionController::class, 'pdf'
    ])->name('prescription_pdf_download_by_patient');
});

//Route::prefix('doctors')->group(function () {

Route::middleware(['isPharmacist'])->group(function () {

    Route::get('/pharmacist_dashboard', function () {
        return view('pharmacist.pages.index');
    })->name('pharmacist_dashboard');

    Route::get('/add_medicine_type', function () {
        return view('pharmacist.add_medicine_type');
    })->name('add_medicine_type');

    Route::post('/insert_medicine_type', [MedicineTypeController::class, 'insert_medicine_type'])->name('insert_medicine_type');

    Route::get('/medicine_types', [MedicineTypeController::class, 'index'])->name('medicine_types');

    Route::get('/edit_medicine_type/{id}', [MedicineTypeController::class, 'get_info_of_medicine_type'])->name('edit_medicine_type');

    Route::post('/update_medicine_type/{id}', [MedicineTypeController::class, 'update_medicine_type'])->name('update_medicine_type');

    Route::get('/delete_medicine_type/{id}', [MedicineTypeController::class, 'delete_medicine_types_information'])->name('delete_medicine_type');


    Route::get('/add_medicine', [MedicineController::class, 'medicine_type_for_medicine'])->name('add_medicine');

    Route::post('/insert_medicine', [MedicineController::class, 'insert_medicine'])->name('insert_medicine');

    Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines');

    Route::post('/changeStatus', [MedicineController::class, 'changeStatus'])->name('changeStatus');

    // Route::get('/admin/medicines', function () {
    //     return view('admin.medicines');
    // });

    Route::get('/edit_medicines_info/{id}', [MedicineController::class, 'get_info_of_medicine'])->name('edit_medicines_info');

    Route::post('/update_medicines_info/{id}', [MedicineController::class, 'update_medicines_info'])->name('update_medicines_info');

    Route::get('/delete_medicines_info/{id}', [MedicineController::class, 'delete_medicines_info'])->name('delete_medicines_info');
});








// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });
