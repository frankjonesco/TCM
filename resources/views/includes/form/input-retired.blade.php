<div class="field !col-span-1">

    <label for="retired">
        Retired
    </label>

    <input
        type="text"
        name="retired"
        placeholder="YYYY" 
        value="{{old('retired') ?: (isset($resource->retired) ? $resource->retired : null)}}"
    >

    <x-elements.validation-error element="retired" />

</div>