<x-layout.app :pageHeadings="$pageHeadings">


    {{-- RESOURCE LAYOUT --}}

    <section class="resource-layout">


        {{-- IMAGE --}}

        <x-elements.resource-image :resource="$judge" />


        {{-- TEXT --}}

        <div>

            {!!nl2p($judge->description)!!}

        </div>


    </section>  


</x-layout.app>
