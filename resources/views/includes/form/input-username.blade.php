<div class="field">

    <label for="username">
        Email or username
    </label>

    <input 
        type="text"
        name="username"
        placeholder="Email or username"
        value="{{$errors->has('username') ? null : old('username')}}"
        {{$errors->has('username') ? 'autofocus' : null}}
    >

</div>