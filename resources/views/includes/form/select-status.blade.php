<div class="field">

    <label for="status">
        Status
    </label>

    <select name="status" required>

        <option
            value="{{null}}"
            selected
        >Select a status...</option>

        <option
            value="private"
            {{(old('status') === 'private') ? 'selected' : (isset($resource->status) && $resource->status === 'private' ? 'selected' : null)}}
        >Private</option>

        <option
            value="public"
            {{(old('status') === 'public') ? 'selected' : (isset($resource->status) && $resource->status === 'public' ? 'selected' : null)}}
        >Public</option>

    </select>

    <x-elements.validation-error element="status" />

</div>