<div class="field">

    <label for="body">
        Body
    </label>

    <textarea
        id="{{ckEditorId('body')}}"
        name="body"
        placeholder="Body"
        rows="7"
    >{{old('body') ?: (isset($resource->body) ? $resource->body : null)}}</textarea>

    @php
        $field['ckeditor_field'] = ckEditorId('body');
    @endphp
    
    @include('includes.ckeditor')

    <x-elements.validation-error element="body" />

</div>