<div class="field !col-span-1">

    <label for="court">
        Court
    </label>

    <input
        type="text"
        name="court"
        placeholder="Court" 
        value="{{old('court') ?: (isset($resource->court) ? $resource->court : null)}}"
    >

    <x-elements.validation-error element="court" />

</div>