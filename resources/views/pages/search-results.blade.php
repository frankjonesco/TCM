<x-layout.app :pageHeadings="$pageHeadings" container-class="container-sm">
    
    @if(count($criminal_cases) > 0)

        <h2 class="mb-10">Criminal cases</h2>

        {{-- GRID --}}

        <div class="content-flex mb-20">
            

            @foreach($criminal_cases as $criminal_case)


                {{-- CONTENT LIST ITEM --}}

                <x-cards.content-list-item :resource="$criminal_case" class="content-list-item-vertical" />


            @endforeach

        
        </div>


        {{-- PAGINATION --}}

        {{ $criminal_cases->links() }}
        
    @endif




    @if(count($articles) > 0)

        <h2 class="mb-10">Articles</h2>

        {{-- GRID --}}

        <div class="content-flex mb-20">
                

            @foreach($articles as $article)


                {{-- CONTENT LIST ITEM --}}

                <x-cards.content-list-item :resource="$article" class="content-list-item-vertical" />


            @endforeach

            
        </div>


        {{-- PAGINATION --}}

        {{ $articles->links() }}
        
    @endif




    @if(count($criminals) > 0)

        <h2 class="mb-10">Criminals</h2>

        {{-- GRID --}}

        <div class="content-flex mb-20">
                    

            @foreach($criminals as $criminal)


                {{-- CONTENT LIST ITEM --}}

                <x-cards.content-list-item :resource="$criminal" class="content-list-item-vertical" />


            @endforeach

                
        </div>


        {{-- PAGINATION --}}

        {{ $criminals->links() }}
        
    @endif

</x-layout.app>
