<div class="field">

    <label for="first_name">
        First name
    </label>

    <input
        type="text"
        name="first_name"
        placeholder="First name"
        value="{{old('first_name') ?: (isset($resource->first_name) ? $resource->first_name : null)}}"
    >

    <x-elements.validation-error element="first_name" />

</div>