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
    public $confirmingUnarchive;
    public $details;
    public $tests_id = [];
    public $prescription_id;
    public $test_file = [];
    public $updateMode = false;
    public $prescriptions;
    public $archived;
    public $request = "";
    public $archivedResults;


    public function render()
    {
        
        $prescriptions = prescriptions::when(session()->get('id'), function ($query) {
            return $query->where('is_archive', 0)->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'));
        })->get();

        $archived = prescriptions::when(session()->get('id'), function ($query) {
            return $query->where('is_archive', 1)->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'));
        })->get();

        $this->prescriptions = $prescriptions;
        $this->archived = $archived;

        return view('livewire.show-prescriptions', [
            'prescriptions' => $prescriptions,
            'archived' => $archived,
        ]);
    }

    public function showArchived()
    {
        $this->prescriptions = null;
        $archivedResults = prescriptions::when(session()->get('id'), function ($query) {
            return $query->where('is_archive', 1)->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'));
        })->get();
        // dd($archived);
        $archived = prescriptions::when(session()->get('id'), function ($query) {
            return $query->where('is_archive', 1)->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'));
        })->get();
        $this->archivedResults = $archivedResults;
        $this->archived = $archived;
        $this->updateMode = true;
        return view('livewire.show-prescriptions', [
            'archivedResults' => $archivedResults,
            'archived' => $archived,
        ]);
    }

    public function confirmArchive($id)
    {
        $this->confirmingUnarchive = null;
        $this->confirming = $id;
    }

    public function confirmUnarchive($id)
    {
        $this->confirming = null;
        $this->confirmingUnarchive = $id;
    }

    public function archiveOperation($id)
    {
        // dd('hey');
        // dd($id);
        $archiveReport = prescriptions::find($id);
        if($archiveReport->is_archive == 1){
            $archiveReport->is_archive = 0;
            $archiveReport->save();
        }else{
            $archiveReport->is_archive = 1;
            $archiveReport->save();
        }

        $this->archivedResults = null;
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
