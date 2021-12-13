<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\important_information;
use App\Models\prescriptions;
use App\Models\Test;
use League\Flysystem\MountManager;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{

    public $searchBy;
    public $load;
    public $appointment;
    public $test;
    public $prescription;
    public $aRR;
    use WithPagination;


    protected $rules = [
        'searchBy' => 'required|min:6',
    ];

    public function render()
    {
        // $this->validate();
        $userInfo = important_information::where('nid_card_number', $this->searchBy)
            ->orWhere('birth_certificate_number', $this->searchBy)
            ->orWhere('patients_id', $this->searchBy)
            ->orWhere('doctors_id', $this->searchBy)->first();
        $appointment = Appointment::where('patient_id', $this->searchBy)->get();
        $prescription = prescriptions::where('patients_id', $this->searchBy)->get();

        $this->aRR = array();
        
            foreach ($prescription as $prescriptionBy) {
                $test = Test::where('prescriptions_id', $prescriptionBy->id)->get();
            array_push($this->aRR,$test);
            }
        

        // if(count($this->aRR)>2){
        //     dd($this->aRR);
        // }

        $this->appointment = $appointment;
        $this->prescription = $prescription;
        // $this->test = $test;
        return view('livewire.history', [
            'appointment' => $appointment,
            'prescription' => $prescription,
            'aRR' => $this->aRR
        ]);
    }

    public function historyCheck()
    {
    }
}
