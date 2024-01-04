<x-layout.app :pageHeadings="$pageHeadings">


    {{-- GRID --}}

    <div class="content-grid">
        

        @foreach($criminals as $criminal)


            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-list-item :resource="$criminal" class="content-list-item-vertical" />


        @endforeach

    
    </div>


    {{-- PAGINATION --}}

    {{ $criminals->links() }}
    

</x-layout.app>