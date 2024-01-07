<div class="field">

    <label for="short_name">
        Short name
    </label>

    <input
        type="text"
        name="short_name"
        placeholder="Short name"
        value="{{old('short_name') ?:  (isset($resource->short_name) ? $resource->short_name : null)}}"
    >

    <x-elements.validation-error element="short_name" />

</div>