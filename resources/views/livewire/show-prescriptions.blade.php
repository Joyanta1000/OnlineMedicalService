{{-- {{dd($prescriptions)}} --}}
<div>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Doctors Name</th>
            <th>Patients Name</th>
            <th>Prescribing Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($prescriptions as $prescription)


            <tr>
                <td>{{ $prescription->id }}</td>
                <td>{{ App\Models\doctor::where('doctors_id', $prescription->doctors_id)->first()->first_name }}
                    {{ App\Models\doctor::where('doctors_id', $prescription->doctors_id)->first()->last_name }}</td>
                <td>{{ App\Models\patient::where('patients_id', $prescription->patients_id)->first()->first_name }}
                    {{ App\Models\patient::where('patients_id', $prescription->patients_id)->first()->last_name }}
                </td>
                <td>{{ $prescription->created_at->format('d-m-Y') }} ({{ $prescription->created_at->diffForHumans() }})
                </td>
                <td><button type="button" wire:click="deleteId({{ $prescription->id }})" class="btn btn-danger"
                        data-toggle="modal" data-target="#exampleModal">Delete Post</button></td>
            </tr>


        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Doctors Name</th>
            <th>Patients Name</th>
            <th>Prescribing Date</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>
</div>