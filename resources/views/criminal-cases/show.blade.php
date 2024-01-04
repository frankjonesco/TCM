<x-layout.app :pageHeadings="$pageHeadings">


    {{-- RESOURCE LAYOUT --}}

    <section class="resource-layout">


        {{-- IMAGE --}}

        <x-elements.resource-image :resource="$criminal_case" />


        {{-- TEXT --}}

        <div>

            {!!$criminal_case->description!!}

        </div>


    </section>  


</x-layout.app>
