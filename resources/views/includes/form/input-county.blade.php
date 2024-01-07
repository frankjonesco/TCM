<div class="field !col-span-1">

    <label for="court">
        County
    </label>

    <input
        type="text"
        name="county"
        placeholder="County" 
        value="{{old('county') ?: (isset($resource->county) ? $resource->county : null)}}"
    >

    <x-elements.validation-error element="county" />

</div>