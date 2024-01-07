<div class="field !col-span-1">

    <label for="arrest_date">
        Arrest date
    </label>

    <div class="grid grid-cols-3 gap-2">
        <input
            type="text"
            name="arrest_date_day"
            placeholder="DD" 
            value="{{old('conviction_date_day') ?: (isset($resource->arrest_date_day) ? $resource->arrest_date_day : null)}}"
        >
        <input
            type="text"
            name="arrest_date_month"
            placeholder="MM" 
            value="{{old('conviction_date_month') ?: (isset($resource->arrest_date_month) ? $resource->arrest_date_month : null)}}"
        >
        <input
            type="text"
            name="arrest_date_year"
            placeholder="YYYY" 
            value="{{old('conviction_date_year') ?: (isset($resource->arrest_date_year) ? $resource->arrest_date_year : null)}}"
        >

    </div>

    {{-- <x-elements.validation-error element="dob_day" /> --}}

</div>