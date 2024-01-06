<x-layout.app :pageHeadings="$pageHeadings" :breadcrumbs="$breadcrumbs">


    {{-- GRID --}}

    <div class="content-grid">
        

        @foreach($judges as $judge)


            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-list-item :resource="$judge" class="vertical-layout" />


        @endforeach

    
    </div>


    {{-- PAGINATION --}}

    {{ $judges->links() }}
    

</x-layout.app>