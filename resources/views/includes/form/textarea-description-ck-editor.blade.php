<div class="field">

    <label for="description">
        Description
    </label>

    <textarea
        id="{{ckEditorId('description')}}"
        name="description"
        placeholder="Full description"
        rows="7"
    >{{old('description') ?: (isset($resource->description) ? $resource->description : null)}}</textarea>

    @php
        $field['ckeditor_field'] = ckEditorId('description');
    @endphp
    
    @include('includes._ckeditor')

    <x-elements.validation-error element="description" />

</div>