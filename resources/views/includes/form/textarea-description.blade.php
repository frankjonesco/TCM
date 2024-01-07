<div class="field">

    <label for="description">
        Description
    </label>

    <textarea
        name="description"
        placeholder="Description"
        rows="5"
    >{{old('description') ?: (isset($resource->description) ? $resource->description : null)}}</textarea>

    <x-elements.validation-error element="description" />

</div>