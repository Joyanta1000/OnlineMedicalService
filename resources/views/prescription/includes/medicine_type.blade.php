<div>
    <div>
        <div class="field">
            <select id="select-medicine-type" placeholder="Pick a medicine type...">
                <option value="">Select a medicine type...</option>
                @foreach ($medicine_types as $medicine_type)
                    <option value="{{ $medicine_type->id }}">
                        {{ $medicine_type->medicine_type }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>