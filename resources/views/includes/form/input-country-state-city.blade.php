<div class="field">

    <label for="country_id">
        Country
    </label>

    <select id="selectCountry" name="country_id">

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




<div class="field !col-span-1" id="stateField">

    <label for="state_id">
        State
    </label>

    <select name="state_id" >

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




<div class="field !col-span-1" id="cityField">

    <label for="city">
        City
    </label>

    <input
        type="text"
        name="city"
        placeholder="City" 
        value="{{old('city') ?: (isset($resource->city->name) ? $resource->city->name : null)}}"
    >

    <x-elements.validation-error element="city" />

</div>



<script>
    selectCountry.onchange = function(e){
        e.preventDefault();
        if(selectCountry.value != 226){
            stateField.classList.add('!hidden');
            cityField.classList.remove('!col-span-1');
        }else{
            stateField.classList.remove('!hidden');
            cityField.classList.add('!col-span-1');
        }
    }
</script>