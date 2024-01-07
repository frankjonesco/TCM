<div class="field">

    <label for="criminal_case_id">
        Criminal case
    </label>

    <select name="criminal_case_id">

        <option 
            value="{{null}}"
            selected
        >Select a criminal case...</option>

        @foreach ($criminal_cases as $criminal_case)
                   
            <option
                value="{{$criminal_case->id}}"
                {{(old('criminal_case_id') == $criminal_case->id) ? 'selected' : (isset($resource->criminal_case) && ($resource->criminal_case->id == $criminal_case->id) ? 'selected' : null)}}
            >{{$criminal_case->title}}</option>

        @endforeach

    </select>

    <x-elements.validation-error element="criminal_case_id" />

</div>