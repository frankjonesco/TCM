<x-layout.app :pageHeadings="$pageHeadings">


    {{-- SET OG:IMAGE FOR SHARING THIS PAGE --}}

    <script>
        window.addEventListener('load', function(){
            let metaImage = '{{$article->imagePath()}}';
            document.querySelector('#ogImage').setAttribute('content', metaImage);
        });
    </script>


    {{-- RESOURCE LAYOUT --}}

    <section class="resource-layout">


        {{-- IMAGE --}}

        <x-elements.resource-image :resource="$article" />


        {{-- TEXT --}}
        
        <div>

            {!!$article->introduction!!}

        </div>


        <div>

            {!!$article->body!!}

        </div>


    </section>  


</x-layout.app>
