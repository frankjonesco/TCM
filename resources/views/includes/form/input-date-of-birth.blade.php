<div class="field !col-span-1">

    <label for="dob">
        Date of Birth
    </label>

    <div class="grid grid-cols-3 gap-2">
        <input
            type="text"
            name="dob_day"
            placeholder="DD" 
            value="{{old('city') ?: (isset($resource->dob_day) ? $resource->dob_day : null)}}"
        >
        <input
            type="text"
            name="dob_month"
            placeholder="MM" 
            value="{{old('dob_month') ?: (isset($resource->dob_month) ? $resource->dob_month : null)}}"
        >
        <input
            type="text"
            name="dob_year"
            placeholder="YYYY" 
            value="{{old('dob_year') ?: (isset($resource->dob_year) ? $resource->dob_year : null)}}"
        >

    </div>

    {{-- <x-elements.validation-error element="dob_day" /> --}}

</div>