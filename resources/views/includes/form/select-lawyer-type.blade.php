<div class="field !col-span-1">

    <label for="type">
        Type
    </label>

    <select name="type" required>

        <option
            value="{{null}}"
            selected
        >Select type...</option>

        <option
            value="prosecution"
            {{(old('type') === 'prosecution') ? 'selected' : ((isset($resource->type) && $resource->type == 'prosecution') ? 'selected' : null)}}
        >Prosecution</option>
                        
        <option
            value="defence"
            {{(old('type') === 'defence') ? 'selected' : ((isset($resource->type) && $resource->type == 'defence') ? 'selected' : null)}}
        >Defence</option>
                    
    </select>

</div>