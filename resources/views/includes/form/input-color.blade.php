<div class="field">

    <label for="color">
        Color
    </label>

    <input
        type="text"
        name="color"
        placeholder="color" 
        value="{{old('color') ?: (isset($resource->color) ? $resource->color : null)}}"
    >

    <x-elements.validation-error element="color" />

</div>