<?php

namespace App\Http\Livewire;

use App\Models\prescriptions;
use App\Models\Test;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

use function GuzzleHttp\Promise\all;

class ShowPrescriptions extends Component
{
    use WithFileUploads;
    public $confirming;
    public $details;
    public $tests_id = [];
    public $prescription_id;
    public $test_file = [];
    public $updateMode = false;

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
        $this->prescription_id = $details->id;
        for ($i = 0; $i < count($details->test); $i++) {
            $this->tests_id[$i] = $details->test[$i]->tests_id;
            $this->test_file[$i] = '';
        }
        // dd($details->test);
        $this->updateMode = true;
        return view('livewire.show-prescriptions', [
            'details' => $details,
        ]);
    }

    private function resetInput()
    {
        $this->tests_id = [];
        $this->test_file = [];
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'prescription_id' => 'required',
            'tests_id' => 'required',
            'test_file' => 'required',
        ]);

        // dd(request()->all());
        for ($i = 0; $i < count($this->tests_id); $i++) {
            $save = Test::where(['prescriptions_id' => $this->prescription_id, 'tests_id' => $this->tests_id[$i]])->first();
            $save->test_file = 2;
            
            // if (request()->hasFile('test_file[$i]') && request()->file('test_file[$i]')->isValid()) {
            //     $save->addMedia($this->test_file[$i])
            // ->toMediaCollection('test_file');
            // }
            $save->update();
        }

        $this->resetInput();
        $this->updateMode = false;
    }
}
