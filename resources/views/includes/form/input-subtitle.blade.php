<div class="field">

    <label for="subtitle">
        Subtitle
    </label>

    <input
        type="text"
        name="subtitle"
        placeholder="Subtitle"
        value="{{old('subtitle') ?:  (isset($resource->subtitle) ? $resource->subtitle : null)}}"
    >

    <x-elements.validation-error element="subtitle" />

</div>