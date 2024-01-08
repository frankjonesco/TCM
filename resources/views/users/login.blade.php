<x-layout.app :pageHeadings="$pageHeadings">

    <x-cards.form class="form-sm">

        <form action="/authenticate" method="post">
            
            @csrf
            @method('POST')

            @include('includes.form.input-username')
            @include('includes.form.input-password')
            
            @include('includes.form.buttons-login')

        </form>

    </x-cards.form>

</x-layout.app>