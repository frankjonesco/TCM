<x-layout.app :pageHeadings="$pageHeadings">


    {{-- GRID --}}

    <div class="content-grid">
        

        @foreach($articles as $article)


            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-list-item :resource="$article" class="article-layout" />


        @endforeach

    
    </div>


    {{-- PAGINATION --}}

    {{ $articles->links() }}
    

</x-layout.app>