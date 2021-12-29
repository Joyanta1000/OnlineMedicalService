<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\important_information;
use App\Models\prescriptions;
use App\Models\Test;
use League\Flysystem\MountManager;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class History extends Component
{

    public $searchBy;
    public $load;
    public $appointment;
    public $test;
    public $prescription;
    public $aRR;
    use WithPagination;
    use WithFileUploads;
    public $confirming;
    public $details;
    public $tests_id = [];
    public $prescription_id;
    public $test_file = [];

    protected $rules = [
        'searchBy' => 'required|min:6',
    ];

    public function render()
    {
        // $this->validate();
        $appointment = '';
        $prescription = '';
        $userInfo = '';
        // $this->aRR = null;
        if (isset($this->searchBy)) {
            $userInfo = important_information::where('nid_card_number', $this->searchBy)
                ->orWhere('birth_certificate_number', $this->searchBy)
                ->orWhere('patients_id', $this->searchBy)
                ->orWhere('doctors_id', $this->searchBy)->first();

            $appointment = Appointment::where('patient_id', $userInfo ? $userInfo->patients_id : 0)->orWhere('doctor_id', $userInfo ? $userInfo->doctors_id : 0)->get();
            $prescription = prescriptions::where('patients_id', $userInfo ? $userInfo->patients_id : 0)->orWhere('doctors_id', $userInfo ? $userInfo->doctors_id : 0)->get();
            // if ($this->searchBy) {
            //     dd($appointment, $prescription);
            // }
            $this->aRR = array();

            foreach ($prescription as $prescriptionBy) {
                $test = Test::where('prescriptions_id', $prescriptionBy->id)->get();
                array_push($this->aRR, $test);
            }


            // if(count($this->aRR)>2){
            //     dd($this->aRR);
            // }

        }

        $this->appointment = $appointment;
        $this->prescription = $prescription;
        // $this->test = $test;

        return view('livewire.history', [
            'appointment' => $appointment,
            'prescription' => $prescription,
            'aRR' => $this->aRR
        ]);
    }

    public function back()
    {
        $this->details = null;
    }

    public function view($id)
    {
        $details = prescriptions::with('medicines_for_patients', 'test', 'patients_problems', 'referred_to', 'frequency', 'foodTime', 'duration')->find($id);
        $this->details = $details;
        $this->prescription_id = $details->id;
        for ($i = 0; $i < count($details->test); $i++) {
            $this->tests_id[$i] = $details->test[$i]->tests_id;
            $this->test_file[$i] = '';
        }
        // dd($details->test);
        $this->updateMode = true;
        return view('livewire.history', [
            'details' => $details,
        ]);
    }
}
