<div class="field">

    <label for="last_name">
        Last name
    </label>

    <input
        type="text"
        name="last_name"
        placeholder="Last name"
        value="{{old('last_name') ?: (isset($resource->last_name) ? $resource->last_name : null)}}"
    >

    <x-elements.validation-error element="last_name" />

</div>