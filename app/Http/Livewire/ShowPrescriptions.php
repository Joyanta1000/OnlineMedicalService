<?php

namespace App\Http\Livewire;

use App\Models\prescriptions;
use App\Models\User;
use Livewire\Component;

class ShowPrescriptions extends Component
{
    public $confirming;
    public $details;

    public function render()
    {
        return view('livewire.show-prescriptions', [
            'prescriptions' => prescriptions::when(session()->get('id'), function ($query) {
                return $query->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'));
            })->get(),
        ]);
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        prescriptions::destroy($id);
    }

    public function view($id)
    {
        $details = prescriptions::with('medicines_for_patients', 'test', 'patients_problems', 'referred_to', 'frequency', 'foodTime', 'duration')->find($id);
        $this->details = $details;
        // dd($details->test);
        return view('livewire.show-prescriptions', [
            'details' => $details,
        ]);

    }
}
