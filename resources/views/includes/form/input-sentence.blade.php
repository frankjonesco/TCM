<div class="field">

    <label for="sentence">
        Sentence
    </label>

    <input
        type="text"
        name="sentence"
        placeholder="Sentence" 
        value="{{old('sentence') ?: (isset($resource->sentence) ? $resource->sentence : null)}}"
    >

    <x-elements.validation-error element="sentence" />

</div>