<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css"
        integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    @livewireStyles
    @powerGridStyles
    <style>
        .header {
            background-color: #2c2f33;
            color: white;
            /* text-align: center; */
            max-width: 100%;
            max-height: 500px;
            display: flex;
        }

        .h {
            float: right;
            color: rgb(248, 244, 244);
            margin-left: 0px;
            margin-top: 10px;
            font-size: 10px;
        }

        h1 {
            font-size: 20px;
        }

        h2 {
            font-size: 20px;
        }

        h3 {
            font-size: 20px;
        }

        .img {
            margin: 30px;
        }

        .time {
            float: right;
            position: absolute;
            right: 10px;
            color: rgb(0, 0, 0);
        }

        .another_div {
            display: flex;
            max-height: 400px;
            margin-top: 10px;
            max-width: 500px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            padding: 10px;
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            font-size: 20px;
            text-align: center;
            max-width: 800px;
            min-width: 20px;
            font-size: 20px;
        }

        .grid-width-1 {
            width: 200px;
            min-width: 20px;
        }

        .grid-width-2 {
            width: 1020px;
            min-width: 20px;
        }

        @mediaonlyscreenand(max-width: 768px) {
            [class*="grid-width-"] {
                width: 20%;
            }
        }

        #prescription {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #prescription td,
        #prescription th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #prescription tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #prescription tr:hover {
            background-color: #ddd;
        }

        #prescription th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0b0c0c;
            color: white;
        }

        div.container {
            padding: 10px;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('prescription.includes.navbar')
        @include('prescription.includes.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Prescription</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Prescription</h3>
                                </div>
                                @if (session('status'))
                                    <div class="card-header">
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            {{ session('status') }}
                                        </div>
                                    @elseif(session('failed'))
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            {{ session('failed') }}
                                        </div>
                                    </div>
                                @endif
                                <div style="padding: 20px;">
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    @if (isset($details))

                                        <section class="content">

                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">×</button>
                                                    {{ session('status') }} {{ session('prescriptions_id') }}
                                                </div>
                                            @elseif(session('failed'))
                                                <div class="alert alert-danger" role="alert">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">×</button>
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
                                                <div
                                                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <div class="container">
                                                        <div class="header">
                                                            <div>
                                                                <img class="img"
                                                                    style="max-height: 120px; max-width: 120px;"
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
                                                        <br>
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
                                                                    <p style="color: blue">Details:
                                                                        {{ $details->test[$i]->details ?: 'N/A' }}
                                                                    </p>
                                                                    @if ($details->test[$i]->getMedia('test_file')->count() > 0)
                                                                        <span
                                                                            class="{{ $details->test[$i]->getMedia('test_file') ? '' : 'disabled' }}">
                                                                            @if (pathinfo($details->test[$i]->getMedia('test_file')->last()->file_name ? $details->test[$i]->getMedia('test_file')->last()->file_name : $item->evidence, PATHINFO_EXTENSION) == 'pdf')
                                                                                <a href="{{ url('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"
                                                                                    class="btn btn-primary btn-sm">View</a>
                                                                                <br>
                                                                            @else
                                                                                <a
                                                                                    href="{{ url('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"><img
                                                                                        src="{{ url('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"
                                                                                        width="120px"
                                                                                        style="margin-top: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></a>
                                                                            @endif
                                                                            <br>

                                                                            <a type="button" class="btn btn-danger"
                                                                                href="{{ route('report.delete', $details->test[$i]->getMedia('test_file')->last()->id) }}"
                                                                                style="font-size:10px;color:rgb(243, 231, 231);"
                                                                                onclick="return confirm('Sure?')">&#10007;</a>
                                                                            <br>
                                                                        </span>
                                                                    @endif
                                                                </span>
                                                                <br>
                                                                @if (session()->get('role') == 3)
                                                                    <form
                                                                        action="{{ URL::to('prescription/prescriptions/update') }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <input type="hidden" name="prescription_id"
                                                                            value="{{ $details->id }}"
                                                                            id="prescription_id">
                                                                        <input type="hidden" name="tests_id[]"
                                                                            value="{{ $details->test[$i]->tests_id }}">

                                                                        <input type="file" name="test_file[]"
                                                                            class="form-control" placeholder="Browse">

                                                                        <br>
                                                                        <input type="submit" wire:click.prevent="store"
                                                                            value="Submit Test Report"
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
                                                            <table
                                                                style="width: 100%; font-size: 15px; text-align: center; padding: 20px;"
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
                                                                                    {{ $before_food[$p++] == 1 ? 'checked' : '' }}>
                                                                                Before Food <input type="checkbox"
                                                                                    name="" id=""
                                                                                    {{ $after_food[$q++] == 1 ? 'checked' : '' }}>
                                                                                After Food</td>
                                                                            <td>{{ $duration[$o++] }}</td>
                                                                            <td>{{ $qty[$m++] }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div style="padding: 25px;">
                                                        <b>Recommended Pharmacy:</b>
                                                        <div>
                                                            @foreach (App\Models\pharmacies::all() as $pharmacy)
                                                                <span>{{ $pharmacy->phermacies_name }}</span>
                                                            @endforeach
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
                                    @endif

                                    <br>
                                    {{-- <livewire:prescriptions /> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('prescription.includes.footer')
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    @livewireScripts
    @powerGridScripts
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        window.addEventListener('SwalConfirm', function(event) {
            swal.fire({
                title: event.detail.title,
                imageWidth: 48,
                imageHeight: 48,
                html: event.detail.html,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('delete', event.detail.id);
                }
            })
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js"
        integrity="sha512-7amIsiQ/hxbdPNawBZwmWBWPiwQRNEJlxTj6eVO+xmWd71fs79Iydr4rYARHwDf0rKHpysFxWbj64fjPRHbqfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.js"
        integrity="sha512-IGkpKApwIHDYxPMj2y0hX8dZsPslpdO8Bi12c2aNvLKsF8YjnwJHtjx0NvrTXBm8R9Qq+Nn0Sf/Hf+InGpmBeA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    {{-- <script>
        // alert({{session()->get('role')}});
        $(document).ready(function() {
            if({{session()->get('role')}} == 2) {
                alert({{session()->get('role')}});
                $('#doctor_name').hide();
            }
        });
    </script> --}}
    <script src="{{ asset('../../plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('../../plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('../../plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('../../dist/js/demo.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>
