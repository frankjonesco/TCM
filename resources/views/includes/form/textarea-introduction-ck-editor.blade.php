<div class="field">

    <label for="introduction">
        Introduction
    </label>

    <textarea
        id="{{ckEditorId('introduction')}}"
        name="introduction"
        placeholder="Introduction"
        rows="7"
    >{{old('introduction') ?: (isset($resource->introduction) ? $resource->introduction : null)}}</textarea>

    @php
        $field['ckeditor_field'] = ckEditorId('introduction');
    @endphp
    @include('includes._ckeditor')

    <x-elements.validation-error element="introduction" />

</div>