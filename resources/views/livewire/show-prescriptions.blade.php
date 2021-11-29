@if (isset($details))


    <section class="content">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
            </div>
        @elseif(session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('failed') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container-fluid">
            {{-- <form action="{{ route('prescriptions.store') }}" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="container">
                    <div class="header">
                        <div>
                            <img class="img" style="max-height: 120px; max-width: 120px;"
                                src="{{ asset('./logo/logo_4.png') }}" alt="">
                            <div class="h">
                                <h1>
                                    {{-- {{dd($details)}} --}}
                                    {{ App\Models\doctor::where('doctors_id', $details->doctors_id)->first()->first_name }}
                                    {{ App\Models\doctor::where('doctors_id', $details->doctors_id)->first()->last_name }}

                                </h1>
                                <h3>
                                    @foreach (App\Models\doctors_specialities::where('doctors_id', $details->doctors_id)->get() as $doctors_specialities)
                                        {{ $doctors_specialities->specialist_of }}
                                        {{-- {{dd(  )}} --}}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </h3>

                                <h3>
                                    {{-- {{dd(App\Models\address::where('doctors_id', $details->doctors_id)->get())}} --}}

                                    @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                        {{ $doctors_address->address }}
                                        {{-- {{dd(  )}} --}}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                    , Zip:
                                    @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                        {{ $doctors_address->zip_code }}
                                        {{-- {{dd(  )}} --}}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </h3>
                                <h3>
                                    @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                        {{ App\Models\area::where('id', $doctors_address->area_id)->first()->area }}
                                        {{-- {{dd(  )}} --}}
                                    @endforeach
                                    ,
                                    @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                        {{ App\Models\thana::where('id', $doctors_address->thana_id)->first()->thana }}
                                        {{-- {{dd(  )}} --}}
                                    @endforeach
                                    ,
                                    @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                        {{ App\Models\city::where('id', $doctors_address->city_id)->first()->city }}
                                        {{-- {{dd(  )}} --}}
                                    @endforeach
                                    ,
                                    @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                        {{ App\Models\country::where('id', $doctors_address->country_id)->first()->country }}
                                        {{-- {{dd(  )}} --}}
                                    @endforeach
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="another_div">
                        <div>
                            <h2>{{ App\Models\patient::where('patients_id', $details->patients_id)->first()->first_name }}
                                {{ App\Models\patient::where('patients_id', $details->patients_id)->first()->last_name }}
                            </h2>
                            <h3>Patient No: {{ $details->patients_id }}</h3>
                        </div>
                        <div class="time" style="margin-right: 30px;">
                            <h3>{{ $details->created_at->format('d-m-Y') }}</h3>
                            <h3>Prescription No: {{ $details->id }} </h3>
                        </div>
                    </div>
                    <hr>

                    <div class="grid-container">
                        <textarea name="test" class="form-control" id="" cols="140" placeholder="" rows="10"
                            readonly>{{ App\Models\Test::where('prescriptions_id', $details->id)->first()->test }}</textarea>
                    </div>
                    <hr>


                    <div>
                        <div>
                            <div class="field">
                                Patients Problems:
                                @php $jsn = json_decode(App\Models\patients_problems::where('prescriptions_id', $details->id)->first()->problem)  @endphp

                                @foreach ($jsn as $key => $value)
                                    <span
                                        style="color: red">{{ App\Models\problems::where('id', $value)->first()->problems_name }}</span>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                    {{-- {{ $value }} --}}
                                @endforeach
                                {{-- {{ json_encode(App\Models\patients_problems::where('prescriptions_id', $details->id)->first()->problem) }} --}}
                            </div>
                            <hr>
                            <div class="problemShow">

                            </div>

                        </div>
                    </div>
                    <hr>

                    <div>
                        <div>
                            <div class="field">
                                Referred to:
                                {{ App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first()->first_name }}
                                {{ App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first()->last_name }}
                            </div>
                            <hr>
                            {{-- <div class="problemShow">

                            </div> --}}

                        </div>
                    </div>
                    <hr>


                    {{-- <div>
                        <div>
                            <div class="field">
                                Medicines
                            </div>

                        </div>
                    </div> --}}

                    {{-- <hr> --}}
                    <div>

                        <table style="width: 100%; font-size: 15px; text-align: center; padding: 20px;"
                            id="prescription">
                            <thead>
                                <th>Medicine</th>
                                <th>Frequency</th>
                                <th>Time </th>
                                <th>Duration</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="rows">

                                @php $mn = json_decode(App\Models\Frequency::where('prescriptions_id', $details->id)->first()->mn)  @endphp
                                @php $af = json_decode(App\Models\Frequency::where('prescriptions_id', $details->id)->first()->af)  @endphp
                                @php $en = json_decode(App\Models\Frequency::where('prescriptions_id', $details->id)->first()->en)  @endphp
                                @php $nt = json_decode(App\Models\Frequency::where('prescriptions_id', $details->id)->first()->nt)  @endphp
                                @php $qty = json_decode(App\Models\Quantity::where('prescriptions_id', $details->id)->first()->qty)  @endphp
                                @php $duration = json_decode(App\Models\Duration::where('prescriptions_id', $details->id)->first()->duration)  @endphp
                                @php $before_food = json_decode(App\Models\FoodTime::where('prescriptions_id', $details->id)->first()->before_food)  @endphp
                                @php $after_food = json_decode(App\Models\FoodTime::where('prescriptions_id', $details->id)->first()->after_food)  @endphp
                                @php
                                    $i = 0;
                                    $j = 0;
                                    $k = 0;
                                    $l = 0;
                                    $m = 0;
                                    $o = 0;
                                    $p = 0;
                                    $q = 0;
                                @endphp

                                @foreach (App\Models\medicines_for_patients::where('prescriptions_id', $details->id)->get() as $medicines)

                                    <tr>
                                        <td>{{ App\Models\medicines::where('id', $medicines->medicines_id)->first()->medicines_name }}
                                        </td>
                                        <td>
                                            {{ $mn[$i++] }} -
                                            {{ $af[$j++] }} -
                                            {{ $en[$k++] }} -
                                            {{ $nt[$l++] }}
                                        </td>
                                        <td> <input type="checkbox" name="" id=""
                                                {{ $before_food[$p++] == 1 ? 'checked' : '' }}> Before Food <input
                                                type="checkbox" name="" id=""
                                                {{ $after_food[$q++] == 1 ? 'checked' : '' }}> After Food</td>
                                        <td>{{ $duration[$o++] }}</td>
                                        <td>{{ $qty[$m++] }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{-- <button type="submit" name="submit"
                                        class="btn btn-primary form-control">Prescribe</button> --}}

                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </section>
    {{-- </div> --}}


    {{-- @include('prescription.includes.footer') --}}
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    {{-- </div> --}}

@else
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
                            {{ App\Models\doctor::where('doctors_id', $prescription->doctors_id)->first()->last_name }}
                        </td>
                        <td>{{ App\Models\patient::where('patients_id', $prescription->patients_id)->first()->first_name }}
                            {{ App\Models\patient::where('patients_id', $prescription->patients_id)->first()->last_name }}
                        </td>
                        <td>{{ $prescription->created_at->format('d-m-Y') }}
                            ({{ $prescription->created_at->diffForHumans() }})
                        </td>
                        <td>
                            @if ($confirming === $prescription->id)
                                <button wire:click="kill({{ $prescription->id }})"
                                    class=" btn btn-danger ">Sure?</button>
                            @else
                                <button wire:click="confirmDelete({{ $prescription->id }})"
                                    class=" btn btn-danger ">Delete</button>
                                <button wire:click="view({{ $prescription->id }})"
                                    class=" btn btn-primary ">View</button>
                            @endif
                        </td>
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
@endif
