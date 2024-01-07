<div class="field !col-span-1">

    <label for="city">
        City
    </label>

    <input
        type="text"
        name="city"
        placeholder="City" 
        value="{{old('city') ?: (isset($resource->city->name) ? $resource->city->name : null)}}"
    >

    <x-elements.validation-error element="city" />

</div>