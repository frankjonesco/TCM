<div class="field">

    <label for="name">
        Name
    </label>

    <input 
        type="text"
        name="name"
        placeholder="Name"
        value="{{old('name') ?:  (isset($resource->name) ? $resource->name : null)}}"
    >

    <x-elements.validation-error element="name" />

</div>