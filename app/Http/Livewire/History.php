<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\important_information;
use App\Models\prescriptions;
use League\Flysystem\MountManager;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{

    public $searchBy;
    public $load;
    public $appointment;
    public $prescription;
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
        // dd($userInfo);
        $appointment = Appointment::where('patient_id', $this->searchBy)->get();
        $prescription = prescriptions::where('patients_id', $this->searchBy)->get();

        $this->appointment = $appointment;
        $this->prescription = $prescription;
        //dd($appointment, $prescription);
        return view('livewire.history', [
            'appointment' => $appointment,
            'prescription' => $prescription,
        ]);
    }

    public function historyCheck()
    {
        
    }
}
