<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>
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

<body class="">
    <section class="content">
        <div class="">
            <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="container">
                    <div style="background-color: #2c2f33;
            color: white;
            height: 240px;">
                        <div>
                            <img class="img" style="max-height: 120px; max-width: 120px;"
                                src="{{ asset('logo/logo_4.png') }}" alt="">
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
                    <div class="" style="margin-left: 15px;">
                        <b>Test:</b> <br>
                        <form action="{{ URL::to('prescription/prescriptions/update') }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="prescription_id" wire:model="prescription_id"
                                id="prescription_id">
                            @for ($i = 0; $i < count($details->test); $i++)
                                {{-- {{$item->tests_id}} --}}

                                <span style="color: red">
                                    Name:
                                    {{ $details->test[$i]->tests_id ? App\Models\TestModel::find($details->test[$i]->tests_id)->test : 'N/A' }}
                                    <p style="color: blue">Details: {{ $details->test[$i]->details ?: 'N/A' }}</p>
                                    <br>
                                    <span>
                                        @if (pathinfo($details->test[$i]->getMedia('test_file')->last()->file_name ? $details->test[$i]->getMedia('test_file')->last()->file_name : $item->evidence, PATHINFO_EXTENSION) == 'pdf')
                                            <a href="{{ url('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"
                                                class="btn btn-primary btn-sm">View</a>
                                            <br>
                                        @else
                                            <a
                                                href="{{ asset('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"><img
                                                    src="{{ asset('/storage/' . $details->test[$i]->getMedia('test_file')->last()->id . '/' . $details->test[$i]->getMedia('test_file')->last()->file_name) }}"
                                                    width="120px"
                                                    style="margin-top: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></a>
                                        @endif
                                        <br>
                                    </span>

                                </span>
                                <br>
                            @endfor

                        </form>
                    </div>
                    <hr>
                    <div>
                        <div>
                            <div class="" style="margin-left: 15px;">
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
                            <div class="" style="margin-left: 15px;">
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
                                <tr>
                                    <th>Medicine</th>
                                    <th>Frequency</th>
                                    <th>Time </th>
                                    <th>Duration</th>
                                    <th>Qty</th>
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
                                        <td>Upto: {{ $duration[$o++] }}</td>
                                        <td>{{ $qty[$m++] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                </div>
            </div>
        </div>
    </section>
</body>

</html>
