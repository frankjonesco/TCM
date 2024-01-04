<x-layout.app :pageHeadings="$pageHeadings">


    {{-- RESOURCE LAYOUT --}}

    <section class="resource-layout">


        {{-- IMAGE --}}

        <x-elements.resource-image :resource="$criminal" />


        {{-- TEXT --}}

        <div>

            {!!nl2p($criminal->description)!!}

        </div>


    </section>  


</x-layout.app>
