<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\doctor;
use App\Models\Duration;
use App\Models\FoodTime;
use App\Models\Frequency;
use App\Models\GeneralHistory;
use App\Models\medicines;
use App\Models\medicines_for_patients;
use App\Models\patients_having_problems;
use App\Models\patients_problems;
use App\Models\prescriptions;
use App\Models\problems;
use App\Models\Quantity;
use App\Models\referred_to;
use App\Models\Test;
use App\Models\TestModel;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;
use Spatie\MediaLibrary\Conversions\ImageGenerators\Pdf as ImageGeneratorsPdf;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PrescriptionController extends Controller
{

    public function index()
    {
        $appointment_id = request()->appointment_id;

        $medicines = medicines::where('is_active', 1)->get();

        $problems = problems::where('is_active', 1)->get();

        $doctors = doctor::whereNotIn('doctors_id', [session()->get('id')])->get();

        $doctorsInfo = User::with('doctor', 'doctors_specialities')->when(session()->get('id'), function ($q) {
            return $q->where('id', session()->get('id'))->orderBy('created_at', 'DESC');
        })->first();

        $doctorsAddresses = address::with('city', 'country', 'thana', 'area')->when(session()->get('id'), function ($q) {
            return $q->where('doctors_id', session()->get('id'))->orderBy('created_at', 'DESC')->latest();
        })->first();

        $patientsInfo = User::with('patient')->when(request()->id, function ($q) {
            return $q->where('id', request()->id)->orderBy('created_at', 'DESC');
        })->first();

        $prescription = prescriptions::orderBy('created_at', 'DESC')->first();

        $tests = TestModel::all();
        return view('prescription.index', compact('appointment_id', 'medicines', 'doctorsInfo', 'doctors', 'doctorsAddresses', 'patientsInfo', 'prescription', 'problems', 'tests'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $id = IdGenerator::generate(['table' => 'prescriptions', 'length' => 10, 'prefix' => date('ym')]);

        $createPrescription = prescriptions::create([
            'id' => $id,
            'appointment_id' => $request->appointment_id,
            'doctors_id' => session()->get('id'),
            'patients_id' => $request->patients_id,
        ]);

        $createHistory = GeneralHistory::create([
            'prescription_id' => $createPrescription->id,
            'history' => $request->history,
        ]);

        foreach ($request->medicines_id as $key => $value) {

            if(is_numeric($value) == false){
                $medicine = medicines::create([
                    'medicines_name' => $value,
                    'is_active' => 1,
                ]);
                $value = $medicine->id;
            }
            $medicines_for_patients = medicines_for_patients::create([
                'prescriptions_id' => $createPrescription->id,
                'medicines_id' => $value,
            ]);
        }

        $mergedTest = $request->tests_id;
        $mergedDetails = $request->details;

        if (isset($request->test_new)) {
            $mergedTest = null;
            $mergedDetails = null;
            $arr = array();

            for ($i = 0; $i < count($request->test_new); $i++) {
                $ar['test'] = $request->test_new[$i];
                $ar['details'] = $request->details_new[$i] ? $request->details_new[$i] : '';
                array_push($arr, $ar);
            }

            $newTestsValue = array();
            $newTestsDetails = array();
            for ($i = 0; $i < count($arr); $i++) {

                $new_test = TestModel::create([
                    'test' => $arr[$i]['test'],
                ]);

                array_push($newTestsValue, $new_test->id);
                array_push($newTestsDetails, $arr[$i]['details']);
            }

            $mergedTest = array_merge($request->tests_id, $newTestsValue);
            $mergedDetails = array_merge($request->details, $newTestsDetails);
        }

        // dd($mergedTest);



        for ($i = 0; $i < count($mergedTest); $i++) {
            $test_for_patients = Test::create([
                'prescriptions_id' => $createPrescription->id,
                'tests_id' => $mergedTest[$i],
                'details' => $mergedDetails[$i],
            ]);
        }

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

        if ($createPrescription) {
            return redirect()->back()->with('status', "Prescribed successfully");
        } else {
            return redirect()->back()->with('failed', "Prescription not created");
        }
    }

    public function show()
    {
        return view('prescription.prescriptions');
    }

    public function edit(prescriptions $prescriptions)
    {
        //
    }

    public function view($id)
    {
        $details = prescriptions::with('doctor','medicines_for_patients', 'test', 'patients_problems', 'referred_to', 'frequency', 'foodTime', 'duration')->find($id);
        
        return view('patient.pages.view_prescription', compact('details'));
    }

    public function report_delete($id)
    {
        Media::find($id)->delete();

        return redirect()->back()->with('message', 'Report deleted successfully');
    }

    public function update(Request $request)
    {
        // dd($request->all(), $request->prescription_id, $request->tests_id[0]);
        // for ($i = 0; $i < count($request->tests_id); $i++) {
            $save = Test::where(['prescriptions_id' => $request->prescription_id, 'tests_id' => $request->tests_id[0]])->first();
            $save->addMedia($request->test_file[0])
                ->toMediaCollection('test_file');
            $mediaItems = $save->load('media')->getMedia('test_file');
            $save->test_file = str_replace($request->test_file[0], $mediaItems[count($mediaItems) - 1]->getFullUrl(), $save->test_file);
            $save->update();
        // }

        if ($save) {
            return redirect()->back()->with(['message' => 'Reports added', 'prescriptions_id' => $save->prescriptions_id]);
        }
        return redirect()->back()->with('failed', 'Reports not added');
    }

    public function pdf($id)
    {
        ini_set('max_execution_time', 300);
        $details = prescriptions::with('medicines_for_patients', 'test', 'patients_problems', 'referred_to', 'frequency', 'foodTime', 'duration')->find($id);
 
        for ($i = 0; $i < count($details->test); $i++) {
            $this->tests_id[$i] = $details->test[$i]->tests_id;
            $this->test_file[$i] = '';
        }
        // dd($details);
        // return view('prescription.prescription_pdf', compact('details'));
        $pdf = PDF::loadView('prescription.prescription_pdf', compact('details'));
        return $pdf->download('prescription.pdf');
    }

    public function destroy(prescriptions $prescriptions)
    {
        //
    }
}
