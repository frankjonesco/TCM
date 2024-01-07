<div class="field">

    <label for="bio">
        Bio
    </label>

    <textarea
        id="{{ckEditorId('bio')}}"
        name="bio"
        placeholder="Bio"
        rows="7"
    >{{old('bio') ?: (isset($resource->bio) ? $resource->bio : null)}}</textarea>

    @php
        $field['ckeditor_field'] = ckEditorId('bio');
    @endphp
    
    @include('includes.ckeditor')

    <x-elements.validation-error element="bio" />

</div>