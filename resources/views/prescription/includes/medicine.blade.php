<div class="field">
<select class="form-control" id="select-state" placeholder="Pick a medicine...">
    <option ></option>
    @foreach ($medicines as $medicine)
        <option value="{{ $medicine->id }}">
            {{ $medicine->medicines_name }}</option>
    @endforeach
</select>
<br>
<button type="button" id="" class="btn btn-primary editCategory">Add</button>
<br>
Or New?
<input type="text" class="form-control" id="medicineD" name="" placeholder="Enter medicine..."
    onkeypress="medicineData()" />
<br>
<div id="appearToAddMedicine"></div>
</div>
