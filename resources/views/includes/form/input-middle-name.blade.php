<div class="field">

    <label for="middle_name">
        Middle name
    </label>

    <input
        type="text"
        name="middle_name"
        placeholder="Middle name"
        value="{{old('middle_name') ?: (isset($resource->middle_name) ? $resource->middle_name : null)}}"
    >

    <x-elements.validation-error element="middle_name" />

</div>