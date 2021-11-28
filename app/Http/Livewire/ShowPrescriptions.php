<?php

namespace App\Http\Livewire;

use App\Models\prescriptions;
use App\Models\User;
use Livewire\Component;

class ShowPrescriptions extends Component
{
    public function render()
    {
        return view('livewire.show-prescriptions', [
            'prescriptions' => prescriptions::when(session()->get('id'), function ($query) {
                return $query->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'));
            })->get(),
        ]);
    }

    public function deleteId($id)
    {
        prescriptions::find($id)->delete();
    }
}
