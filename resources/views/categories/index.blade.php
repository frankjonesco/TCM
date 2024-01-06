<x-layout.app :pageHeadings="$pageHeadings" :breadcrumbs="$breadcrumbs">


    {{-- GRID --}}

    <div class="grid grid-cols-2 gap-10 px-6">


        @foreach($categories as $category)


            {{-- CATEGORY LIST ITEMS --}}

            <x-cards.category-list-item :category="$category" />


        @endforeach
    

    </div>


    {{-- PAGINATION --}}

    {{$categories->links()}}


</x-layout.app>