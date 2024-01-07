<div class="field !col-span-1">

    <label for="state_id">
        State
    </label>

    <select name="state_id" required>

        <option 
            value="{{null}}"
            selected
        >Select a State...</option>

        @foreach ($states as $state)

            <option
                value="{{$state->id}}"
                {{(old('state_id') == $state->id) ? 'selected' : (isset($resource->state_id) && $resource->state_id == $state->id ? 'selected' : null)}}
            >{{$state->name}}</option>

        @endforeach

    </select>

    <x-elements.validation-error element="state_id" />

</div>