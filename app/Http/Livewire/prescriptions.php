<?php

namespace App\Http\Livewire;

use App\Models\doctor;
use App\Models\patient;
use App\Models\prescriptions as ModelsPrescriptions;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class prescriptions extends PowerGridComponent
{
    use ActionButton;

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

        // $topic = new ModelsPrescriptions();
        // dd($topic->testData());
        // return $topic->testData();
        return ModelsPrescriptions::query()->where('is_archive', 0)->where('doctors_id', session()->get('id'))->orWhere('patients_id', session()->get('id'));
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn(session()->get('role') != 2 ? 'doctors_id' : 'patients_id')
            ->addColumn('first_name', function (ModelsPrescriptions $model) {
                return session()->get('role') != 2 ? doctor::where('doctors_id', $model->doctors_id)->first()->first_name : patient::where('patients_id', $model->patients_id)->first()->first_name;
            })
            ->addColumn('last_name', function (ModelsPrescriptions $model) {
                return session()->get('role') != 2 ? doctor::where('doctors_id', $model->doctors_id)->first()->last_name : patient::where('patients_id', $model->patients_id)->first()->last_name;
            })
            ->addColumn('appointment_id')
            // ->addColumn('is_archive', function (ModelsPrescriptions $model) {
            //     return $model->is_archive == 1 ? '<b style="color:red;">Archived</b>' : '';
            // })
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
                ->title(session()->get('role') != 2 ? 'DOCTORS ID' : 'PATIENTS ID')
                ->field(session()->get('role') != 2 ? 'doctors_id' : 'patients_id')
                ->makeInputRange(),

            Column::add()
                ->title(session()->get('role') != 2 ? 'DOCTORS FIRST NAME' : 'PATIENTS FIRST NAME')
                ->field('first_name'),

            Column::add()
                ->title(session()->get('role') != 2 ? 'DOCTORS LAST NAME' : 'PATIENTS LAST NAME')
                ->field('last_name'),

            Column::add()
                ->title('APPOINTMENT ID')
                ->field('appointment_id')
                ->makeInputRange(),

            // Column::add()
            //     ->title('ARCHIVED/NOT')
            //     ->field('is_archive')
            //     ->makeInputRange(),

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
            //    Button::add('edit')
            //        ->caption('Edit')
            //        ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
            //        ->route('prescriptions.edit', ['prescriptions' => 'id']),

            //    Button::add('destroy')
            //        ->caption('Delete')
            //        ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
            //        ->route('prescriptions.destroy', ['prescriptions' => 'id'])
            //    ->method('delete')
            // Button::add('archive')
            //     ->caption('Archive')
            //     ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
            //     ->route('prescriptions.archive', ['prescriptions' => 'id'])
        ];
    }

    public function archive($id)
    {
        try {
            $prescription = ModelsPrescriptions::find($id);
            $prescription->is_archive = 1;
            $prescription->save();
            $this->showUpdateMessages = true;
            $this->emit('prescriptionsUpdated');
        } catch (QueryException $e) {
            $this->showUpdateMessages = false;
            $this->emit('prescriptionsUpdated');
        }
    }

    public function update(array $data): bool
    {
        try {
            $updated = ModelsPrescriptions::query()->findOrFail($data['id'])
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
