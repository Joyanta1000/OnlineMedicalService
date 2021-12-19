  <div>
      <input class="form-control" type="search" id="searchBy" wire:model="searchBy" name="searchBy"
          placeholder="Search History">
      @error('searchBy') <span class="error">{{ $message }}</span> @enderror
      <label style="margin: 10px 0px 0px 0px; color: red;">Type NID/Birth Certificate/Patient Id</label>

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

                                      <h3>
                                          @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                              {{ $doctors_address->address }}
                                              @if (!$loop->last)
                                                  ,
                                              @endif
                                          @endforeach
                                          , Zip:
                                          @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                              {{ $doctors_address->zip_code }}
                                              @if (!$loop->last)
                                                  ,
                                              @endif
                                          @endforeach
                                      </h3>
                                      <h3>
                                          @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                              {{ App\Models\area::where('id', $doctors_address->area_id)->first()->area }}
                                          @endforeach
                                          ,
                                          @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                              {{ App\Models\thana::where('id', $doctors_address->thana_id)->first()->thana }}
                                          @endforeach
                                          ,
                                          @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                              {{ App\Models\city::where('id', $doctors_address->city_id)->first()->city }}
                                          @endforeach
                                          ,
                                          @foreach (App\Models\address::where('doctors_id', $details->doctors_id)->get() as $doctors_address)
                                              {{ App\Models\country::where('id', $doctors_address->country_id)->first()->country }}
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
                          <div class="field" style="margin-left: 15px;">
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
                                          <p style="color: blue">Details: {{ $details->test[$i]->details ?: 'N/A' }}
                                          </p>

                                          <span><img
                                                  src="{{ $details->test[$i]->getFirstMediaUrl('test_file', 'thumb') ? $details->test[$i]->getFirstMediaUrl('test_file', 'thumb') : asset('./default/nothing.jpg') }}"
                                                  width="120px"
                                                  style="margin-top: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></span>
                                      </span>
                                      <br>
                                      @if (session()->get('role') == 3)
                                          <input type="hidden" name="tests_id[]"
                                              wire:model="tests_id.{{ $i }}">

                                          <input type="file" name="test_file[]" class="form-control"
                                              wire:model="test_file.{{ $i }}" placeholder="Browse">
                                          <div wire:loading wire:target="test_file.{{ $i }}">Getting
                                              File...</div>
                                      @endif

                                      <br>
                                  @endfor
                                  @if (session()->get('role') == 3)
                                      <input type="submit" wire:click.prevent="store" value="Submit Test Report"
                                          class="btn btn-primary">
                                  @endif
                              </form>
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
                                                      {{ $before_food[$p++] == 1 ? 'checked' : '' }}> Before Food
                                                  <input type="checkbox" name="" id=""
                                                      {{ $after_food[$q++] == 1 ? 'checked' : '' }}> After Food
                                              </td>
                                              <td>{{ $duration[$o++] }}</td>
                                              <td>{{ $qty[$m++] }}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                          <hr>
                          <div>
                              <div style="position: inline; right: 10px; padding: 10px;">
                                  <button wire:click="back()" class=" btn btn-primary ">Back</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <aside class="control-sidebar control-sidebar-dark">
          </aside>

      @else

          <div style="margin-top: 20px;" class="row row-cols-1 row-cols-md-3 g-4">
              <div class="col">
                  @foreach ($appointment as $appointmentBy)
                      <div class="card">
                          <div class="card-body">
                              <p class="card-text">
                                  {{ App\Models\doctor::where('doctors_id', $appointmentBy->doctor_id)->first()->doctors_id == session()->get('id') ? 'You' : App\Models\doctor::where('doctors_id', $appointmentBy->doctor_id)->first()->first_name }}
                                  took appointment from
                                  {{ App\Models\patient::where('patients_id', $appointmentBy->patient_id)->first()->patients_id == session()->get('id') ? 'You' : App\Models\patient::where('patients_id', $appointmentBy->patient_id)->first()->first_name }}
                                  on
                                  {{ $appointmentBy->created_at->format('d-m-Y') }}
                                  ({{ $appointmentBy->created_at->diffForHumans() }})
                              </p>
                          </div>
                      </div>
                  @endforeach
                  {{-- {{ $appointment->onEachSide(1)->links() }} --}}
              </div>
              <div class="col">
                  @foreach ($prescription as $prescriptionBy)
                      <div class="card" id="hover">
                          <div class="card-body">
                              {{-- <button wire:click="view({{ $prescription->id }})"
                                    class=" btn btn-primary ">View</button> --}}
                              <p wire:click="view({{ $prescriptionBy->id }})" class="card-text">
                                  {{ App\Models\doctor::where('doctors_id', $prescriptionBy->doctors_id)->first()->doctors_id == session()->get('id') ? 'You' : App\Models\doctor::where('doctors_id', $prescriptionBy->doctors_id)->first()->first_name }}
                                  gave prescription to
                                  {{ App\Models\patient::where('patients_id', $prescriptionBy->patients_id)->first()->patients_id == session()->get('id') ? 'You' : App\Models\patient::where('patients_id', $prescriptionBy->patients_id)->first()->first_name }}
                                  on
                                  {{ $prescriptionBy->created_at->format('d-m-Y') }}
                                  ({{ $prescriptionBy->created_at->diffForHumans() }})
                              </p>
                          </div>
                      </div>
                  @endforeach
                  {{-- {{ $prescription->onEachSide(1)->links() }} --}}
              </div>
              <div class="col">
                  @foreach ($aRR as $testBy)
                      <div class="card">
                          <div class="card-body">
                              <p class="card-text">
                                  @foreach ($testBy as $testByMedia)
                                      <label>{{ $testByMedia->tests_id ? App\Models\TestModel::where('id', $testByMedia->tests_id)->first()->test : 'Test not given' }}</label>
                                      @if (!$loop->last)
                                          ,
                                      @endif
                                  @endforeach
                                  <br>
                                  @foreach ($testBy as $testByMedia)
                                      <span><img
                                              src="{{ $testByMedia->getFirstMediaUrl('test_file', 'thumb') ? $testByMedia->getFirstMediaUrl('test_file', 'thumb') : asset('./default/nothing.jpg') }}"
                                              width="120px"
                                              style="margin-top: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></span>
                                      @if (!$loop->last)
                                          &nbsp;
                                      @endif
                                  @endforeach
                              </p>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
      @endif
  </div>
