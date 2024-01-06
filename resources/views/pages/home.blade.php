<x-layout.app :pageHeadings="$pageHeadings">

    {{-- GRID --}}

    <div class="content-grid">
        

        @foreach($criminal_cases as $criminal_case)


            {{-- CONTENT LIST ITEM --}}

            <x-cards.content-image-text-overlay :resource="$criminal_case" class="vertical-layout" />


        @endforeach

    
    </div>

    <div class="flex flex-col xl:flex-row gap-6">

        <div class="w-full xl:w-2/3 flex flex-col gap-6">

            <div class="block-heading">
                <span>
                    True Crime News
                </span>
            </div>

            @foreach($articles as $article)


                {{-- CONTENT LIST ITEM --}}

                <x-cards.content-list-item :resource="$article" />


            @endforeach

        </div>

        <div class="w-1/3 sidebar hidden xl:block">

            <div class="color-block">
                <div class="block-heading">
                    <span>
                        Criminal profiles
                    </span>
                </div>
                @foreach($criminals as $criminal)


                    {{-- CONTENT LIST ITEM --}}

                    <x-cards.content-list-item :resource="$criminal" />


                @endforeach
            </div>

        </div>

    </div>


</x-layout.app>