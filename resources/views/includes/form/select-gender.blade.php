<div class="field !col-span-1">

    <label for="last_name">
        Gender
    </label>

    <select name="gender" required>

        <option
            value="{{null}}"
            selected
        >Select a gender...</option>

        <option
            value="male"
            {{(old('gender') === 'male') ? 'selected' : ((isset($resource->gender) && $resource->gender == 'male') ? 'selected' : null)}}
        >Male</option>
                        
        <option
            value="female"
            {{(old('gender') === 'female') ? 'selected' : ((isset($resource->gender) && $resource->gender == 'female') ? 'selected' : null)}}
        >Female</option>
                    
    </select>

</div>