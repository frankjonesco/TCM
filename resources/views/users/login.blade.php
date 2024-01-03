<x-layout.app :pageHeadings="$pageHeadings">


    <x-cards.form class="form-sm">
        

        <form action="/authenticate" method="POST">
            
            
            @csrf
            @method('POST')


            {{-- USERNAME --}}

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


            {{-- Password --}}

            <div class="field">

                <label for="password">
                    Password
                </label>

                <input 
                    type="password"
                    name="password"
                    placeholder="Password"
                    {{$errors->has('password') ? 'autofocus' : null}}
                >

            </div>


            {{-- BUTTONS --}}

            <div class="buttons">

                <button 
                    type="submit" 
                    class="btn"
                >Log in</button>

            </div>


        </form>


    </x-cards.form>


</x-layout.app>