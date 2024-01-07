<div class="field">

    <label for="category_id">
        Category
    </label>

    <select name="category_id">

        <option 
            value="{{null}}"
            selected
        >Select a category...</option>

        @foreach ($categories as $category)
                   
            <option
                value="{{$category->id}}"
                {{(old('category_id') == $category->id) ? 'selected' : (isset($resource->category) && ($resource->category->id == $category->id) ? 'selected' : null)}}
            >{{$category->name}}</option>

        @endforeach

    </select>

    <x-elements.validation-error element="category_id" />

</div>