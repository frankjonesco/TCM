<x-layout.app :pageHeadings="$pageHeadings">


    {{-- GRID --}}

    <div class="content-grid">
        

        @foreach($judges as $judge)


            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-list-item :resource="$judge" class="content-list-item-vertical" />


        @endforeach

    
    </div>


    {{-- PAGINATION --}}

    {{ $judges->links() }}
    

</x-layout.app>