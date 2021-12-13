  <div>
      <input class="form-control" type="search" id="searchBy" wire:model="searchBy" name="searchBy"
          placeholder="Search History">
      @error('searchBy') <span class="error">{{ $message }}</span> @enderror
      <label style="margin: 10px 0px 0px 0px; color: red;">Type NID/Birth Certificate/Patient Id</label>
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
                  <div class="card">
                      <div class="card-body">
                          <p class="card-text">
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
  </div>
