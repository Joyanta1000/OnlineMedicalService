@if (isset($details))

    <section class="content">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }} {{ session('prescriptions_id') }}
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
            @csrf
            <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="container">
                    <div class="header">
                        <div>
                            <img class="img" style="max-height: 120px; max-width: 120px;"
                                src="{{ asset('./logo/logo_4.png') }}" alt="">
                            <div class="h" style="margin: 15px;">
                                <h1>
                                    {{ App\Models\doctor::where('doctors_id', $details->doctors_id)->first()->first_name }}
                                    {{ App\Models\doctor::where('doctors_id', $details->doctors_id)->first()->last_name }}
                                </h1>
                                <h3>
                                    @foreach (App\Models\doctors_specialities::where('doctors_id', $details->doctors_id)->get() as $doctors_specialities)
                                        {{ $doctors_specialities->specialist_of }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </h3>

                                <h3>Work Place:
                                    {{ App\Models\contact_information::where('doctors_id', $details->doctors_id)->first()->work_place }}
                                </h3>
                                <h3>Work Mobile Number:
                                    {{ App\Models\contact_information::where('doctors_id', $details->doctors_id)->first()->works_mobile_phone }}
                                </h3>
                                <h3>Fax:
                                    {{ App\Models\contact_information::where('doctors_id', $details->doctors_id)->first()->fax }}
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
                    <br>
                    <div class="field" style="margin-left: 15px;">
                        <b>General Information:</b>
                        <br>
                        <span>
                            {!! nl2br(App\Models\GeneralHistory::where('prescription_id', $details->id)->first()->history ? App\Models\GeneralHistory::where('prescription_id', $details->id)->first()->history : 'N/A') !!}
                        </span>
                    </div>
                    <br>
                    <div class="field" style="margin-left: 15px;">
                        <b>Test:</b> <br>


                        @for ($i = 0; $i < count($details->test); $i++)
                            {{-- {{$item->tests_id}} --}}

                            <span style="color: red">
                                Name:
                                {{ $details->test[$i]->tests_id ? App\Models\TestModel::find($details->test[$i]->tests_id)->test : 'N/A' }}
                                <p style="color: blue">Details: {{ $details->test[$i]->details ?: 'N/A' }}</p>
                                @if ($details->test[$i]->getMedia('test_file')->count() > 0)
                                    <span class="{{ $details->test[$i]->getMedia('test_file') ? '' : 'disabled' }}">
                                        @if (pathinfo($details->test[$i]->getMedia('test_file')->last()->file_name ? $details->test[$i]->getMedia('test_file')->last()->file_name : $item->evidence, PATHINFO_EXTENSION) == 'pdf')
                                            <a href="{{ url('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"
                                                download>
                                                <iframe
                                                    src="{{ url('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"
                                                    class="btn btn-primary btn-sm"></iframe> Download</a>

                                        @else

                                            <a href="{{ url('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"
                                                download><img
                                                    src="{{ url('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"
                                                    width="120px"
                                                    style="margin-top: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></a>
                                        @endif

                                        {{-- <button class="material-icons btn btn-danger"
                                            wire:click="deleteImageFromLibrary({{ $details->id }}, {{ $details->test[$i]->getMedia('test_file')->last()->id }})"
                                            style="font-size:10px;color:rgb(243, 231, 231);">&#10007;</button> --}}
                                        {{-- {{dd($confirmingDelete, $details->test[$i]->getMedia('test_file')->last()->id)}} --}}
                                        {{-- @if ($confirmingDelete == $details->test[$i]->getMedia('test_file')->last()->id) --}}
                                        {{-- {{dd($confirmingDelete)}} --}}
                                        {{-- <button class="material-icons btn btn-danger"
                                                wire:click="deleteImageFromLibrarySure({{ $details->id }}, {{ $details->test[$i]->getMedia('test_file')->last()->id }})"
                                                style="font-size:10px;color:rgb(243, 231, 231);">Sure?</button> --}}
                                        {{-- {{dd($confirmingDelete, $details->test[$i]->getMedia('test_file')->last()->id)}} --}}
                                        {{-- <button wire:click="deleteImageFromLibrarySure({{ $details->id }}, {{ $details->test[$i]->getMedia('test_file')->last()->id }})"
                                    class=" btn btn-danger ">Sure?</button> --}}
                                        {{-- @elseif(session()->get('role') != 3)
                                <button wire:click="deleteImageFromLibrary({{ $details->id }}, {{ $details->test[$i]->getMedia('test_file')->last()->id }})"
                                    class=" btn btn-danger " style="font-size:10px;color:rgb(243, 231, 231);" >&#10007;</button>
                               
                            @endif --}}

                                        <br>
                                    </span>
                                @endif
                            </span>
                            <br>
                            @if (session()->get('role') == 3)
                                <form action="{{ URL::to('prescription/prescriptions/update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="prescription_id" wire:model="prescription_id"
                                        id="prescription_id">
                                    <input type="hidden" name="tests_id[]" wire:model="tests_id.{{ $i }}">

                                    <input type="file" name="test_file[]" class="form-control"
                                        wire:model="test_file.{{ $i }}" placeholder="Browse">
                                    <div wire:loading wire:target="test_file.{{ $i }}">Getting File...
                                    </div>
                                    <br>
                                    <input type="submit" wire:click.prevent="store" value="Submit Test Report"
                                        class="btn btn-primary">
                                </form>
                            @endif
                            </span>
                            <br>
                        @endfor
                    </div>
                    <hr>
                    <div>
                        <div>
                            <div class="field" style="margin-left: 15px;">
                                <b>Patients Problems:</b>
                                @php $jsn = json_decode(App\Models\patients_problems::where('prescriptions_id', $details->id)->first()->problem)  @endphp
                                @foreach ($jsn as $key => $value)
                                    <span
                                        style="color: red">{{ App\Models\problems::where('id', $value)->first()->problems_name }}</span>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            <div class="problemShow">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div>
                        <div>
                            <div class="field" style="margin-left: 15px;">
                                <b>Referred to:</b>
                                {{ App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first() ? App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first()->first_name : '' }}
                                {{ App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first() ? App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first()->last_name : '' }}
                            </div>
                            <hr>
                        </div>
                    </div>
                    <hr>
                    <div style="margin: 15px;">
                        <table style="width: 100%; font-size: 15px; text-align: center; padding: 20px;"
                            id="prescription">
                            <thead>
                                <th>Medicine</th>
                                <th>Frequency</th>
                                <th>Time </th>
                                <th>Duration</th>
                                <th>Qty</th>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div>
                    <div style="position: inline; right: 10px; padding: 10px;">
                        <a href="{{ URL::to(session()->get('role') == 2 ? 'prescription/prescription_for_doctor/show' : 'prescription/prescriptions/show') }}"
                            class="btn btn-primary"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
@elseif(isset($archivedResults))
    <div>
        <div style="position: absolute; right: 20px;">
            @if ($backtolist == 1)
                <button wire:click="backtoMainList()" class=" btn btn-success "><i class="fa fa-arrow-left"></i>
                    Back</button>
            @endif
            &nbsp;
            <a type="button" class="btn btn-danger" href="#">{{ $archived->count() }} archived</a> &nbsp;
            <button class="material-icons btn btn-primary" wire:click="showArchived()"
                style="font-size:35px;color:rgb(243, 231, 231)">archive</button>
        </div>
        <br>
        <br><br>
        <table style="margin-top: 10px;" id="example1" class="table table-bordered table-striped">
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
                @foreach ($archivedResults as $archivedResult)
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($archivedResult->archive as $item)
                        @if ($item->archived_by == session()->get('id'))
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach

                    <tr style="{{ $count >= 1 ? '' : 'display: none;' }}">
                        <td>{{ $archivedResult->id }}</td>
                        <td>{{ App\Models\doctor::where('doctors_id', $archivedResult->doctors_id)->first()->first_name }}
                            {{ App\Models\doctor::where('doctors_id', $archivedResult->doctors_id)->first()->last_name }}
                        </td>
                        <td>{{ App\Models\patient::where('patients_id', $archivedResult->patients_id)->first()->first_name }}
                            {{ App\Models\patient::where('patients_id', $archivedResult->patients_id)->first()->last_name }}
                        </td>
                        <td>{{ $archivedResult->created_at->format('d-m-Y') }}
                            ({{ $archivedResult->created_at->diffForHumans() }})
                        </td>
                        <td>
                            @if ($confirmingUnarchive === $archivedResult->id)
                                <button wire:click="archiveOperation({{ $archivedResult->id }})"
                                    class=" btn btn-danger ">Sure?</button>
                            @else

                                <button wire:click="confirmUnarchive({{ $archivedResult->id }})"
                                    class=" btn btn-danger ">{{ $count >= 1 ? 'Unarchive' : 'Archive' }}</button>
                                @if (session()->get('role') != 3)
                                    <button wire:click="view({{ $archivedResult->id }})"
                                        class=" btn btn-primary ">View</button>
                                @else
                                    <a type="button" class=" btn btn-primary "
                                        href="{{ route('prescription.view', $archivedResult->id) }}">View</a>

                                @endif
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
@elseif(isset($prescriptions) && $details1 == null)
    <div>

        <div style="position: absolute; right: 20px;"><a type="button" class="btn btn-danger"
                href="#">{{ $archived->count() }} archived</a> &nbsp;
            <button class="material-icons btn btn-primary" wire:click="showArchived()"
                style="font-size:35px;color:rgb(243, 231, 231)">archive</button>
        </div>

        <br>
        <br><br>
        <table style="margin-top: 10px;" id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    @if (session()->get('role') != 2)
                        <th>Doctors Name</th>
                    @endif
                    @if (session()->get('role') != 3)
                        <th>Patients Name</th>
                    @endif
                    <th>Prescribing Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prescriptions as $prescription)
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($prescription->archive as $item)
                        @if ($item->archived_by == session()->get('id'))
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach

                    <tr style="{{ $count >= 1 ? 'display: none;' : '' }}">
                        <td>{{ $prescription->id }}</td>
                        @if (session()->get('role') != 2)
                            <td>{{ App\Models\doctor::where('doctors_id', $prescription->doctors_id)->first()->first_name }}
                                {{ App\Models\doctor::where('doctors_id', $prescription->doctors_id)->first()->last_name }}
                            </td>
                        @endif
                        @if (session()->get('role') != 3)
                            <td>{{ App\Models\patient::where('patients_id', $prescription->patients_id)->first()->first_name }}
                                {{ App\Models\patient::where('patients_id', $prescription->patients_id)->first()->last_name }}
                            </td>
                        @endif
                        <td>{{ $prescription->created_at->format('d-m-Y') }}
                            ({{ $prescription->created_at->diffForHumans() }})
                        </td>
                        <td>

                            @if ($confirming === $prescription->id)
                                <button wire:click="archiveOperation({{ $prescription->id }})"
                                    class=" btn btn-danger ">Sure?</button>

                            @else

                                <button wire:click="confirmArchive({{ $prescription->id }})"
                                    class=" btn btn-danger ">{{ $count >= 1 ? 'Unarchive' : 'Archive' }}</button>

                                @if (session()->get('role') != 3)
                                    <button wire:click="view({{ $prescription->id }})"
                                        class=" btn btn-primary ">View</button>
                                @else
                                    <a type="button" class=" btn btn-primary "
                                        href="{{ route('prescription.view', $prescription->id) }}">View</a>

                                @endif

                                <a href="{{ route(session()->get('role') == 3 ? 'prescription_pdf_download_by_patient' : 'prescription_pdf', $prescription->id) }}"
                                    class="btn btn-success"><i class="fa fa-file-pdf-o"
                                        style="font-size:20px;color:rgb(241, 232, 232)"></i></a>

                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    @if (session()->get('role') != 2)
                        <th>Doctors Name</th>
                    @endif
                    @if (session()->get('role') != 3)
                        <th>Patients Name</th>
                    @endif
                    <th>Prescribing Date</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

    </div>
@endif
