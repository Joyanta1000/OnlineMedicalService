<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>
    <style>
        .header {
            background-color: #eff2f7;
            color: rgb(36, 32, 32);
            /* text-align: center; */
            max-width: 100%;
            max-height: 500px;
            display: flex;
        }

        .h {
            float: right;
            color: rgb(5, 5, 5);
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
            background-color: #2a2e2e;
            color: white;
        }

        div.container {
            padding: 10px;
        }

    </style>
</head>

<body class="">
    <section class="content">
        <div class="">
            <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="container">
                    <div style=" background-color: #343a40;
            
            height: 150px; border-radius: 5px;">
                        <div>
                            <div class="h" style="margin: 15px; color: white;">
                            <h1>
                                    {{ App\Models\doctor::where('doctors_id', $details->doctors_id)->first()->first_name }}
                                    {{ App\Models\doctor::where('doctors_id', $details->doctors_id)->first()->last_name }}
                                </h1>
                                <span style="font-size: 15px; color: white;">
                                    @foreach (App\Models\doctors_specialities::where('doctors_id', $details->doctors_id)->get() as $doctors_specialities)
                                        {{ $doctors_specialities->specialist_of }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </span>
                                <br>
                                <span style="font-size: 15px; color: white;">Work Place:
                                    {{ App\Models\contact_information::where('doctors_id', $details->doctors_id)->first()->work_place }}
                                </span>
                                <br>
                                <span style="font-size: 15px; color: white;">Work Mobile Number:
                                    {{ App\Models\contact_information::where('doctors_id', $details->doctors_id)->first()->works_mobile_phone }}
                                </span>
                                <br>
                                <span style="font-size: 15px; color: white;">Fax:
                                    {{ App\Models\contact_information::where('doctors_id', $details->doctors_id)->first()->fax }}
                                </span>
                            
                                
                            </div>
                            <img class="img" style="height: 80px; max-width: 100px;"
                                src="{{ asset('logo/logo_4.png') }}" alt="">
                        </div>
                        </div>
                    </div>
                    <hr>
                    <div class="another_div" style="padding-left: 85px;">
                        <div class="col-md5">
                            <span>Patient Name:
                                {{ App\Models\patient::where('patients_id', $details->patients_id)->first()->first_name }}
                                {{ App\Models\patient::where('patients_id', $details->patients_id)->first()->last_name }}
                            </span><br>
                            <span>Patient No: {{ $details->patients_id }}</span>
                        </div>
                        <div class="time" style="margin-left: 60px;">
                            <span>Prescribed Date: {{ $details->created_at->format('d-m-Y') }}</span><br>
                            <span>Prescription No: {{ $details->id }} </span>
                        </div>
                    </div>
                    <hr>
                    <div style="margin: 15px;">
                        <table style="width: 100%; font-size: 15px; text-align: center; padding: 20px;"
                            id="prescription">

                            <tbody class="rows">

                                @php $mn = json_decode(App\Models\Frequency::where('prescriptions_id', $details->id)->first()->mn)  @endphp
                                @php $af = json_decode(App\Models\Frequency::where('prescriptions_id', $details->id)->first()->af)  @endphp
                                @php $en = json_decode(App\Models\Frequency::where('prescriptions_id', $details->id)->first()->en)  @endphp
                                @php $nt = json_decode(App\Models\Frequency::where('prescriptions_id', $details->id)->first()->nt)  @endphp
                                @php $qty = json_decode(App\Models\Quantity::where('prescriptions_id', $details->id)->first()->qty)  @endphp
                                @php $short_note = json_decode(App\Models\Quantity::where('prescriptions_id', $details->id)->first()->short_note)  @endphp
                                @php $duration = json_decode(App\Models\Duration::where('prescriptions_id', $details->id)->first()->duration)  @endphp
                                @php $duration_time = json_decode(App\Models\Duration::where('prescriptions_id', $details->id)->first()->duration_time)  @endphp
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
                                    $r = 0;
                                    $s = 0;
                                    $t = 0;
                                    $u = 0;
                                    $v = 0;
                                    $w = 0;
                                    $x = 0;
                                @endphp
                                <tr>
                                    <th>Medicine</th>
                                    <th>Frequency</th>
                                    <th>Time </th>
                                    <th>Duration</th>
                                    <th>Qty/Short Note</th>
                                </tr>
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
                                                {{ $before_food[$p++] == 1 ? 'checked' : '' }} readonly> Before Food
                                            <input type="checkbox" name="" id=""
                                                {{ $after_food[$q++] == 1 ? 'checked' : '' }} readonly> After Food
                                        </td>
                                        <td>{{ $duration[$o++] }} @if ($duration_time[$r++] == 0) Day/Days @endif @if ($duration_time[$t++] == 1) Month/Months  @endif @if ($duration_time[$u++] == 2) Year/Years  @endif</td>
                                        <td> Qty: {{ $qty[$m++] }} <br> S. Note: {{ $short_note[$s++] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="field" style="margin-left: 15px;">
                        <b>General Information:</b>
                        <br>
                        <span>
                            {!! nl2br(App\Models\GeneralHistory::where('prescription_id', $details->id)->first()->history ? App\Models\GeneralHistory::where('prescription_id', $details->id)->first()->history : 'N/A') !!}
                        </span>
                    </div>
                    {{-- <br>
                    <div class="" style="margin-left: 15px;">
                        <b>Test:</b> <br>
                        <form action="{{ URL::to('prescription/prescriptions/update') }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="prescription_id" wire:model="prescription_id"
                                id="prescription_id">
                            @for ($i = 0; $i < count($details->test); $i++)

                                <span style="color: red">
                                    Name:
                                    {{ $details->test[$i]->tests_id ? App\Models\TestModel::find($details->test[$i]->tests_id)->test : 'N/A' }}
                                    <p style="color: blue">Details: {{ $details->test[$i]->details ?: 'N/A' }}</p>
                                    <br>
                                    <span>
                                        @if (pathinfo($details->test[$i]->getMedia('test_file')->last() ? $details->test[$i]->getMedia('test_file')->last()->file_name : '', PATHINFO_EXTENSION) == 'pdf')
                                            <a href="{{ url('/storage/' . ($details->test[$i]->getMedia('test_file')->last() ? $details->test[$i]->getMedia('test_file')->last()->id : 0). '/' . ($details->test[$i]->getMedia('test_file')->last() ? $details->test[$i]->getMedia('test_file')->last()->file_name : '')) }}"
                                                download>
                                                <iframe
                                                    src="{{ url('/storage/' . ($details->test[$i]->getMedia('test_file')->last() ? $details->test[$i]->getMedia('test_file')->last()->id : 0). '/' . ($details->test[$i]->getMedia('test_file')->last() ? $details->test[$i]->getMedia('test_file')->last()->file_name : '')) }}"
                                                    class="btn btn-primary btn-sm"></iframe> Download</a>

                                        @else

                                            <a href="{{ url('/storage/' . ($details->test[$i]->getMedia('test_file')->last() ? $details->test[$i]->getMedia('test_file')->last()->id : 0). '/' . ($details->test[$i]->getMedia('test_file')->last() ? $details->test[$i]->getMedia('test_file')->last()->file_name : '')) }}"
                                                download><img
                                                    src="{{ url('/storage/' . ($details->test[$i]->getMedia('test_file')->last() ? $details->test[$i]->getMedia('test_file')->last()->id : 0). '/' . ($details->test[$i]->getMedia('test_file')->last() ? $details->test[$i]->getMedia('test_file')->last()->file_name : '')) }}"
                                                    width="120px"
                                                    style="margin-top: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></a>
                                        @endif
                                        <br>
                                    </span>

                                </span>
                                <br>
                            @endfor

                        </form>
                    </div> --}}
                    <hr>

                    <div>
                        <div>
                            <div class="" style="margin-left: 15px;">
                                <b>Referred to:</b>
                                {{ App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first() ? App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first()->first_name : '' }}
                                {{ App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first() ? App\Models\doctor::where('doctors_id', App\Models\referred_to::where('prescriptions_id', $details->id)->first()->referred_to)->first()->last_name : '' }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div style="padding: 15px;">
                        <b>Recommended Pharmacy:</b>
                        <div>
                            @foreach (App\Models\pharmacies::all() as $pharmacy)
                                <span>{{ $pharmacy->pharmacies_name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
