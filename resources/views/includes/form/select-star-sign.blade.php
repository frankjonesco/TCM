<div class="field">

    <label for="last_name">
        Star sign
    </label>

    <select name="star_sign">

        <option 
            value="{{null}}" 
            selected
        >Select a star sign...</option>

        <option 
            value="Aries" 
            {{(old('star_sign') === 'Aries') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Aries') ? 'selected' : null)}}
        >Aries</option>

        <option 
            value="Taurus"
            {{(old('star_sign') === 'Taurus') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Taurus') ? 'selected' : null)}}
        >Taurus</option>

        <option 
            value="Gemini"
            {{(old('star_sign') === 'Gemini') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Gemini') ? 'selected' : null)}}
        >Gemini</option>

        <option 
            value="Cancer"
            {{(old('star_sign') === 'Cancer') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Cancer') ? 'selected' : null)}}
        >Cancer</option>

        <option 
            value="Leo"
            {{(old('star_sign') === 'Leo') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Leo') ? 'selected' : null)}}
        >Leo</option>

        <option 
            value="Virgo"
            {{(old('star_sign') === 'Virgo') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Virgo') ? 'selected' : null)}}
        >Virgo</option>

        <option 
            value="Libra"
            {{(old('star_sign') === 'Libra') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Libra') ? 'selected' : null)}}
        >Libra</option>

        <option 
            value="Scorpio"
            {{(old('star_sign') === 'Scorpio') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Scorpio') ? 'selected' : null)}}
        >Scorpio</option>

        <option 
            value="Sagittarius"
            {{(old('star_sign') === 'Sagittarius') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Sagittarius') ? 'selected' : null)}}
        >Sagittarius</option>

        <option 
            value="Capricorn"
            {{(old('star_sign') === 'Capricorn') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Capricorn') ? 'selected' : null)}}
        >Capricorn</option>

        <option 
            value="Aquarius"
            {{(old('star_sign') === 'Aquarius') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Aquarius') ? 'selected' : null)}}
        >Aquarius</option>

        <option 
            value="Pisces"
            {{(old('star_sign') === 'Pisces') ? 'selected' : ((isset($resource->star_sign) && $resource->star_sign == 'Pisces') ? 'selected' : null)}}
        >Pisces</option>

    </select>
    
</div>