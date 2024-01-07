<div class="field">

    <label for="country_id">
        Country
    </label>

    <select name="country_id" required>

        <option 
            value="{{null}}"
            selected
        >Select country...</option>

        @foreach ($countries as $country)
                   
            <option
                value="{{$country->id}}"
                {{(old('country_id') == $country->id) ? 'selected' : (isset($resource->country) && ($resource->country->id == $country->id) ? 'selected' : (($country->name === 'United States') ? 'selected' : null))}}
            >{{$country->name}}</option>

        @endforeach

    </select>

    <x-elements.validation-error element="country_id" />

</div>