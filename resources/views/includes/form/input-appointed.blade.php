<div class="field !col-span-1">

    <label for="appointed">
        Appointed
    </label>

    <input
        type="text"
        name="appointed"
        placeholder="YYYY" 
        value="{{old('appointed') ?: (isset($resource->appointed) ? $resource->appointed : null)}}"
    >

    <x-elements.validation-error element="appointed" />

</div>