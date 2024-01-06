<x-layout.app :pageHeadings="$pageHeadings" :breadcrumbs="$breadcrumbs">


    {{-- GRID --}}

    <div class="content-grid">
        

        @foreach($criminals as $criminal)


            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-list-item :resource="$criminal" class="vertical-layout" />


        @endforeach

    
    </div>


    {{-- PAGINATION --}}

    {{ $criminals->links() }}
    

</x-layout.app>