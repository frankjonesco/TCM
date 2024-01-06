<x-layout.app :pageHeadings="$pageHeadings">


    <x-cards.form class="form-md">
        

        <form action="/contact-us/send" method="POST">
            
            
            @csrf
            @method('POST')


            {{-- NAME --}}

            <div class="field">

                <label for="name">
                    Name
                </label>

                <input 
                    type="text"
                    name="name"
                    placeholder="Your name"
                    value="{{$errors->has('name') ? null : old('name')}}"
                    {{$errors->has('name') ? 'autofocus' : null}}
                >

            </div>


            {{--  EMAIL --}}

            <div class="field">

                <label for="email">
                    Email
                </label>

                <input 
                    type="email"
                    name="email"
                    placeholder="Your email"
                    value="{{$errors->has('email') ? null : old('email')}}"
                    {{$errors->has('email') ? 'autofocus' : null}}
                >

            </div>


            {{-- MESSAGE --}}

            <div class="field">

                <label for="message">
                    Message
                </label>

                <textarea
                    name="message"
                    placeholder="Your message"
                    rows="5"
                    value="{{$errors->has('message') ? null : old('message')}}"
                    {{$errors->has('message') ? 'autofocus' : null}}
                ></textarea>

            </div>


            {{-- BUTTONS --}}

            <div class="buttons">

                <button 
                    type="submit" 
                    class="btn"
                >Send message</button>

            </div>


        </form>


    </x-cards.form>


</x-layout.app>