<div class="field">

    <label for="caption">
        Caption
    </label>

    <textarea
        name="caption"
        placeholder="Caption"
        rows="5"
    >{{old('caption') ?: (isset($resource->caption) ? $resource->caption : null)}}</textarea>

    <x-elements.validation-error element="caption" />

</div>