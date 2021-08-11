<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['isAdmin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.index');
    });
});
Route::get('/add_gender', function () {
    return view('admin.add_gender');
});

Route::post('/insert_gender',[GenderController::class, 'insert_gender']);

Route::get('/genders',[GenderController::class, 'index']);

Route::get('/edit_gender/{id}',[GenderController::class, 'get_info_of_gender']);

Route::post('/update_gender/{id}',[GenderController::class, 'update_genders_info']);

Route::get('/delete_genders_information/{id}',[GenderController::class, 'delete_genders_information']);

Route::get('/add_country', function () {
    return view('admin.add_country');
});

Route::post('/insert_country',[CountryController::class, 'insert_country']);

Route::get('/countries',[CountryController::class, 'index']);

Route::get('/edit_country/{id}',[CountryController::class, 'get_info_of_country']);

Route::post('/update_country/{id}',[CountryController::class, 'update_countries_info']);

Route::get('/delete_countries_information/{id}',[CountryController::class, 'delete_countries_information']);

Route::get('/add_city',[CountryController::class, 'countries_for_cities']);

Route::post('/insert_city',[CityController::class, 'insert_city']);

Route::get('/cities',[CityController::class, 'index']);

Route::get('/edit_city/{id}',[CityController::class, 'get_info_of_city']);

Route::post('/update_city/{id}',[CityController::class, 'update_cities_info']);

Route::get('/delete_cities_information/{id}',[CityController::class, 'delete_cities_information']);

Route::get('/add_thana',[ThanaController::class, 'countries_for_thana']);

Route::get('/get_city_for_thana/{id}',[ThanaController::class, 'cities_for_thana']);

Route::post('/insert_thana',[ThanaController::class, 'insert_thana']);

Route::get('/thanas',[ThanaController::class, 'index']);

Route::get('/edit_thana/{id}',[ThanaController::class, 'get_info_of_thana']);

Route::post('/update_thana/{id}',[ThanaController::class, 'update_thanas_info']);

Route::get('/delete_thanas_information/{id}',[ThanaController::class, 'delete_thanas_information']);

Route::get('/add_area',[AreaController::class, 'countries_for_area']);

Route::get('/get_thana_for_area/{id}',[AreaController::class, 'thanas_for_area']);

Route::post('/insert_area',[AreaController::class, 'insert_area']);

Route::get('/areas',[AreaController::class, 'index']);

Route::get('/edit_area/{id}',[AreaController::class, 'get_info_of_area']);

Route::post('/update_area/{id}',[AreaController::class, 'update_areas_info']);

Route::get('/delete_areas_information/{id}',[AreaController::class, 'delete_areas_information']);

Route::get('/get_area_for_address/{id}',[AreaController::class, 'areas_for_address']);

Route::get('/add_specialities_of_doctor', function () {
    return view('admin.add_specialities_of_doctor');
});

Route::post('/insert_speciality',[SpecialityController::class, 'insert_speciality']);

Route::get('/specialities',[SpecialityController::class, 'index']);

Route::get('/edit_speciality/{id}',[SpecialityController::class, 'get_info_of_speciality']);

Route::post('/update_speciality/{id}',[SpecialityController::class, 'update_specialities_info']);

Route::get('/delete_specialities_information/{id}',[SpecialityController::class, 'delete_specialities_information']);

Route::get('/add_marital_status', function () {
    return view('admin.add_marital_status');
});

Route::post('/insert_marital_status',[MaritalStatusController::class, 'insert_marital_status']);

Route::get('/marital_statuses',[MaritalStatusController::class, 'index']);

Route::get('/edit_marital_status/{id}',[MaritalStatusController::class, 'get_info_of_marital_status']);

Route::post('/update_marital_status/{id}',[MaritalStatusController::class, 'update_marital_status']);

Route::get('/delete_marital_status/{id}',[MaritalStatusController::class, 'delete_marital_statuses_information']);


Route::get('/add_medicine_type', function () {
    return view('admin.add_medicine_type');
});

Route::post('/insert_medicine_type',[MedicineTypeController::class, 'insert_medicine_type']);

Route::get('/medicine_types',[MedicineTypeController::class, 'index']);

Route::get('/edit_medicine_type/{id}',[MedicineTypeController::class, 'get_info_of_medicine_type']);

Route::post('/update_medicine_type/{id}',[MedicineTypeController::class, 'update_medicine_type']);

Route::get('/delete_medicine_type/{id}',[MedicineTypeController::class, 'delete_medicine_types_information']);


Route::get('/add_medicine',[MedicineController::class, 'medicine_type_for_medicine']);

Route::post('/insert_medicine',[MedicineController::class, 'insert_medicine']);

Route::get('/medicines',[MedicineController::class, 'index']);

Route::post('/changeStatus',[MedicineController::class, 'changeStatus']);

// Route::get('/admin/medicines', function () {
//     return view('admin.medicines');
// });

Route::get('/edit_medicines_info/{id}',[MedicineController::class, 'get_info_of_medicine']);

Route::post('/update_medicines_info/{id}',[MedicineController::class, 'update_medicines_info']);

Route::get('/delete_medicines_info/{id}',[MedicineController::class, 'delete_medicines_info']);

Route::get('/add_problem', function () {
    return view('admin.add_problem');
});

Route::post('/insert_problem',[ProblemController::class, 'insert_problem']);

Route::get('/problems',[ProblemController::class, 'index']);

Route::post('/change_status_of_problem',[ProblemController::class, 'change_status_of_problem']);

Route::get('/edit_problems_info/{id}',[ProblemController::class, 'get_info_of_problem']);

Route::post('/update_problems_info/{id}',[ProblemController::class, 'update_problems_info']);

Route::get('/delete_problems_info/{id}',[ProblemController::class, 'delete_problems_info']);



Route::get('/doctors_registration',[UserController::class, 'countries_for_area']);

Route::post('/register_doctor',[UserController::class, 'register_doctor']);

Route::get('/patients_registration',[UserController::class, 'countries_for_area_for_patients_registration']);

Route::post('/register_patient',[UserController::class, 'register_patient']);

Route::get('/pharmacists_registration',[UserController::class, 'countries_for_area_for_pharmacists_registration']);

Route::post('/register_pharmacy',[UserController::class, 'register_pharmacy']);

Route::get('/emailverify',[UserController::class, 'verify']);

Route::get('/verification/{token}',[UserController::class, 'verified']);

Route::get('/authentication/verification_message',[UserController::class, 'verified']);

Route::get('/User_Login', function () {
    return view('authentication.User_Login');
});

Route::post('/login',[UserController::class, 'redirectTo']);

Route::middleware(['isDoctor'])->group(function () {

Route::get('/doctor_dashboard', function () {
    return view('doctor.pages.index');
});

});

Route::middleware(['isPatient'])->group(function () {

Route::get('/patient_dashboard', function () {
    return view('patient.pages.index');
});

});

Route::middleware(['isPharmacist'])->group(function () {

    Route::get('/pharmacist_dashboard', function () {
        return view('pharmacist.pages.index');
    });
    
    });

    Route::get('/doctors',[UserController::class, 'doctors']);

Route::get('/reset', function () {
    return view('authentication.info_for_reset');
});

Route::post('/send_mail_to_reset_password',[UserController::class, 'send_mail_to_reset_password']);

Route::get('/reset_password/{token}',[UserController::class, 'reset_password']);

Route::post('/reset_user_password/{email}',[UserController::class, 'reset_user_password']);