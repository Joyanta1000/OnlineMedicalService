<?php

namespace App\Http\Livewire;

use App\Models\Archive;
use App\Models\prescriptions;
use App\Models\Test;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Str;

use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

use function GuzzleHttp\Promise\all;
use Livewire\WithPagination;

use App\Models\prescriptions as ModelsPrescriptions;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ShowPrescriptions extends Component
{
    use WithFileUploads;
    public $confirming;
    public $confirmingUnarchive;
    public $confirmingDelete;
    public $details;
    public $details1;
    public $tests_id = [];
    public $prescription_id;
    public $test_file = [];
    public $updateMode = false;
    public $prescriptions;
    public $archived;
    public $request = "";
    public $archivedResults;
    use WithPagination;
    use ActionButton;
    public $backtolist = false;
    public $deleteImage = false;

    protected $listeners = ['delete', 'deleteCheckedCountries'];

    public function render()
    {
        $prescriptions = prescriptions::with('archive')->when(session()->get('id'), function ($query) {
            return $query->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'));
        })->get();
        $archived = Archive::when(session()->get('id'), function ($query) {
            return $query->where('archived_by', session()->get('id'));
        })->get();
        $this->prescriptions = $prescriptions;
        $this->archived = $archived;
        return view('livewire.show-prescriptions', [
            'prescriptions' => $prescriptions,
            'archived' => $archived,
        ]);
    }

    // public function mount($id)
    // {
    //     $this->view($id);
    // }

    public function showArchived()
    {
        $this->backtolist = true;
        $this->prescriptions = null;
        $archivedResults = prescriptions::with('archive')->when(session()->get('id'), function ($query) {
            return $query->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'));
        })->get();
        $archived = Archive::when(session()->get('id'), function ($query) {
            return $query->where('archived_by', session()->get('id'));
        })->get();
        $this->archivedResults = $archivedResults;
        $this->archived = $archived;
        $this->updateMode = true;
        return view('livewire.show-prescriptions', [
            'archivedResults' => $archivedResults,
            'archived' => $archived,
        ]);
    }

    public function backtoMainList()
    {
        $this->backtolist = false;
        $this->archivedResults = null;
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
        $isExist = Archive::where(['prescription_id' => $id, 'archived_by' => session()->get('id')])->exists();
        if ($isExist == false) {
            Archive::create([
                'prescription_id' => $id,
                'archived_by' => session()->get('id'),
            ]);
        } else {
            Archive::where([
                'prescription_id' => $id,
                'archived_by' => session()->get('id'),
            ])->delete();
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
        for ($i = 0; $i < count($this->tests_id); $i++) {
            $save = Test::where(['prescriptions_id' => $this->prescription_id, 'tests_id' => $this->tests_id[$i]])->first();
            $save->test_file = 2;
            $save->update();
        }

        $this->resetInput();
        $this->updateMode = false;
    }

    public function deleteImageFromLibrary($id, $media_id)
    {
        // $this->details = null;

        // $this->deleteImage = true;

        $this->confirmingDelete = $media_id;

        // dd($this->confirmingDelete, $media_id);

        // dd($id, $media_id);

        // return view('livewire.show-prescriptions', [
        //     'deleteImage' => $this->deleteImage,
        // ]);

        // $details = prescriptions::with('medicines_for_patients', 'test', 'patients_problems', 'referred_to', 'frequency', 'foodTime', 'duration')->find($id);
        // $this->details = $details;
        // $this->prescription_id = $details->id;
        // for ($i = 0; $i < count($details->test); $i++) {
        //     $this->tests_id[$i] = $details->test[$i]->tests_id;
        //     $this->test_file[$i] = '';
        // }
        $this->prescriptions = null;
        $this->updateMode = true;

        $this->details = null;

        // $details = prescriptions::with('medicines_for_patients', 'test', 'patients_problems', 'referred_to', 'frequency', 'foodTime', 'duration')->find($id);
        // $this->details = $details;
        // $this->prescription_id = $details->id;
        // for ($i = 0; $i < count($details->test); $i++) {
        //     $this->tests_id[$i] = $details->test[$i]->tests_id;
        //     $this->test_file[$i] = '';
        // }
        // $this->updateMode = true;
        // return view('livewire.show-prescriptions', [
        //     'details' => $details,
        // ]);

        // $this->details1 = $id;
        // $info = Media::find($media_id);
        // $details1 = $this->details1;
        // session()->flash('message', $info->file_name.' report file successfully deleted. Your prescription id is '. $id);
        // return redirect()->to(
        //     'prescription/prescriptions/show', compact(
        //     'details1')
        // );

        // $info = Media::find($media_id);
        // // dd($info);
        // $this->dispatchBrowserEvent('SwalConfirm', [
        //     'title' => 'Are you sure?',
        //     'html' => 'You want to delete <strong>' . $info->file_name . '</strong>',
        //     'id' => $media_id
        // ]);

        // session()->flash('message', $info->file_name.' report successfully deleted.');

    }

    public function deleteImageFromLibrarySure($id, $media_id)
    {
        Media::find($id)->delete();
        $this->deleteImage = false;
    }

    public bool $showUpdateMessages = true;

    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    

    public function datasource(): ?Builder
    {
        return ModelsPrescriptions::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('patients_id')
            ->addColumn('doctors_id')
            ->addColumn('appointment_id')
            ->addColumn('created_at_formatted', function (ModelsPrescriptions $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('updated_at_formatted', function (ModelsPrescriptions $model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            });
    }

    public function columns(): array
    {
        return [
            Column::add()
                ->title('ID')
                ->field('id')
                ->makeInputRange(),

            Column::add()
                ->title('PATIENTS ID')
                ->field('patients_id')
                ->makeInputRange(),

            Column::add()
                ->title('DOCTORS ID')
                ->field('doctors_id')
                ->makeInputRange(),

            Column::add()
                ->title('APPOINTMENT ID')
                ->field('appointment_id')
                ->makeInputRange(),

            Column::add()
                ->title('CREATED AT')
                ->field('created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('created_at'),

            Column::add()
                ->title('UPDATED AT')
                ->field('updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('updated_at'),

        ];
    }

    public function actions(): array
    {
        return [
            Button::add('edit')
                ->caption('Edit')
                ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->route('prescriptions.edit', ['prescriptions' => 'id']),

            Button::add('destroy')
                ->caption('Delete')
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
                ->route('prescriptions.destroy', ['prescriptions' => 'id'])
                ->method('delete')
        ];
    }

    public function update(array $data): bool
    {
        try {
            $updated = prescriptions::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
        } catch (QueryException $exception) {
            $updated = false;
        }
        return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
}
