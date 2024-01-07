<div class="field">

    <label for="title">
        Title
    </label>

    <input 
        type="text"
        name="title"
        placeholder="Title"
        value="{{old('title') ?: (isset($resource->title) ? $resource->title : null)}}"
    >

    <x-elements.validation-error element="title" />

</div>