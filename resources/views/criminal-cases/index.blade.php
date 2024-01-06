<x-layout.app :pageHeadings="$pageHeadings" :breadcrumbs="$breadcrumbs">


    {{-- GRID --}}

    <div class="content-grid">
        

        @foreach($criminal_cases as $criminal_case)


            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-list-item :resource="$criminal_case" class="vertical-layout" />


        @endforeach

    
    </div>


    {{-- PAGINATION --}}

    {{ $criminal_cases->links() }}
    

</x-layout.app>