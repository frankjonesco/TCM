<x-layout.app :pageHeadings="$pageHeadings">


    {{-- GRID --}}

    <div class="content-grid">
        

        @foreach($articles as $article)


            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-list-item :resource="$article" class="content-list-item-vertical" />


        @endforeach

    
    </div>


    {{-- PAGINATION --}}

    {{ $articles->links() }}
    

</x-layout.app>