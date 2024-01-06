<x-layout.app :pageHeadings="$pageHeadings">


    <x-cards.form class="form-md">
        

        <form action="/contact-us/send" method="POST">
            
            
            @csrf
            @method('POST')


            {{-- SENDER NAME --}}

            <div class="field">

                <label for="sender_name">
                    Name
                </label>

                <input 
                    type="text"
                    name="sender_name"
                    placeholder="Your name"
                    value="{{$errors->has('sender_name') ? null : old('sender_name')}}"
                    {{$errors->has('sender_name') ? 'autofocus' : null}}
                >

            </div>


            {{-- SENDER EMAIL --}}

            <div class="field">

                <label for="sender_email">
                    Email
                </label>

                <input 
                    type="email"
                    name="sender_email"
                    placeholder="Your email"
                    value="{{$errors->has('sender_email') ? null : old('sender_email')}}"
                    {{$errors->has('sender_email') ? 'autofocus' : null}}
                >

            </div>


            {{-- MESSAGE --}}

            <div class="field">

                <label for="message">
                    Message
                </label>

                <textarea
                    name="sender_email"
                    placeholder="Your message"
                    rows="5"
                    value="{{$errors->has('sender_email') ? null : old('sender_email')}}"
                    {{$errors->has('sender_email') ? 'autofocus' : null}}
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