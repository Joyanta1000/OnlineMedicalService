<style>
    .hover_option:hover {
        background-color: rgba(37, 35, 39, 0.493);
        color: white;
    }

</style>

{{-- <div class="field">
    <div><input type="text" class="form-control" id="search" onkeyup="filter();" placeholder="Search the medicine"></div>
    <br>

<select type="text" class="form-control" id="select-state" placeholder="Pick a medicine...">
    <option ></option>
    @foreach ($medicines as $medicine)
        <option value="{{ $medicine->id }}">
            {{ $medicine->medicines_name }}</option>
    @endforeach
</select> --}}
{{-- <input list="select-state" name="browser">
<datalist id="select-state">
    @foreach ($medicines as $medicine)
  <option value="{{ $medicine->id }}">
    {{ $medicine->medicines_name }}</option>
      @endforeach
</datalist> --}}

<input type="text" class="form-control" id="searchFilter" name="searchFilter" placeholder="Search"
    onkeyup="filterItems(this);">
<select id="select-state" class="form-control" name="ddVehicles" size="4">
    @foreach ($medicines as $medicine)
        <option class="hover_option" value="{{ $medicine->id }}">
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



<script>
    $(document).ready(function() {
        get();
    });
    var optionsCache = [];

    function filterItems(el) {
        var value = el.value.toLowerCase();
        var form = el.form;
        var opt, sel = form.ddVehicles;
        if (value == '') {
            restoreOptions();
        } else {
            // Loop backwards through options as removing them modifies the next
            // to be visited if go forwards
            for (var i = sel.options.length - 1; i >= 0; i--) {
                opt = sel.options[i];
                if (opt.text.toLowerCase().indexOf(value) == -1) {
                    sel.removeChild(opt)
                }
            }
        }
    }

    // Restore select to original state
    function restoreOptions() {
        var sel = document.getElementById('select-state');
        sel.options.length = 0;
        for (var i = 0, iLen = optionsCache.length; i < iLen; i++) {
            sel.appendChild(optionsCache[i]);
        }
    }


    function get() {
        // Load cache
        var sel = document.getElementById('select-state');
        for (var i = 0, iLen = sel.options.length; i < iLen; i++) {
            optionsCache.push(sel.options[i]);
        }
    }
</script>
